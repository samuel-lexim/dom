<?php
require_once dirname( __FILE__ ) . '/wpml-update-term-action.class.php';

use WPML\FP\Lst;
use WPML\FP\Fns;
use WPML\FP\Obj;
use WPML\FP\Logic;
use function WPML\FP\pipe;

/**
 * @since      3.1.8
 *
 * Class WPML_Terms_Translations
 *
 * This class holds some basic functionality for translating taxonomy terms.
 *
 * @package    wpml-core
 * @subpackage taxonomy-term-translation
 */
class WPML_Terms_Translations {

	/**
	 * @param array<string|\WP_Term> $terms
	 * @param string[]|string        $taxonomies This is only used by the WP core AJAX call that fetches the preview
	 *                                           auto-complete for flat taxonomy term adding
	 *
	 * @return array<\WP_Term>
	 * @deprecated since Version 3.1.8.3
	 */
	public static function get_terms_filter( $terms, $taxonomies ) {
		global $wpdb, $sitepress;

		$lang = $sitepress->get_current_language();

		foreach ( $taxonomies as $taxonomy ) {

			if ( $sitepress->is_translated_taxonomy( $taxonomy ) ) {

				$element_type = 'tax_' . $taxonomy;

				$query = $wpdb->prepare(
					"SELECT wptt.term_id
                                          FROM {$wpdb->prefix}icl_translations AS iclt
                                          JOIN {$wpdb->prefix}term_taxonomy AS wptt
                                            ON iclt.element_id = wptt.term_taxonomy_id
                                          WHERE language_code=%s AND element_type = %s",
					$lang,
					$element_type
				);

				$element_ids_array = $wpdb->get_col( $query );

				foreach ( $terms as $key => $term ) {
					if ( ! is_object( $term ) ) {
						$term = get_term_by( 'name', $term, $taxonomy );
					}
					if ( $term && isset( $term->taxonomy )
						 && $term->taxonomy === $taxonomy
						 && ! in_array( $term->term_id, $element_ids_array ) ) {
						unset( $terms[ $key ] );
					}
				}
			}
		}

		return $terms;
	}

	/**
	 * @param string $slug
	 * @param string $taxonomy
	 * @param string $lang
	 * Creates a unique slug for a given term, using a scheme
	 * encoding the language code in the slug.
	 *
	 * @return string
	 */
	public static function term_unique_slug( $slug, $taxonomy, $lang ) {
		global $sitepress;

		$default_language = $sitepress->get_default_language();

		if ( $lang !== $default_language && self::term_slug_exists( $slug, $taxonomy ) ) {
			$slug .= '-' . $lang;
		}

		$i      = 2;
		$suffix = '-' . $i;

		if ( self::term_slug_exists( $slug, $taxonomy ) ) {
			while ( self::term_slug_exists( $slug . $suffix, $taxonomy ) ) {
				$i ++;
				$suffix = '-' . $i;
			}
			$slug .= $suffix;
		}

		return $slug;
	}

	/**
	 * @param string $slug
	 * @param string $taxonomy
	 *
	 * @return bool
	 */
	private static function term_slug_exists( $slug, $taxonomy ) {
		global $wpdb;

		$existing_term_prepared_query = $wpdb->prepare(
			"SELECT t.term_id
                                                         FROM {$wpdb->terms} t
                                                         JOIN {$wpdb->term_taxonomy} tt
                                                          ON t.term_id  = tt.term_id
                                                         WHERE t.slug = %s
                                                          AND tt.taxonomy = %s
                                                         LIMIT 1",
			$slug,
			$taxonomy
		);
		$term_id                      = $wpdb->get_var( $existing_term_prepared_query );

		return (bool) $term_id;
	}

	/**
	 * This function provides an action hook only used by WCML.
	 * It will be removed in the future and should not be implemented in new spots.
	 *
	 * @deprecated deprecated since version 3.1.8.3
	 *
	 * @param string $taxonomy The identifier of the taxonomy the translation was just saved to.
	 * @param array $translated_term The associative array holding term taxonomy id and term id,
	 *                         as returned by wp_insert_term or wp_update_term.
	 */
	public static function icl_save_term_translation_action( $taxonomy, $translated_term ) {
		global $wpdb, $sitepress;

		if ( is_taxonomy_hierarchical( $taxonomy ) ) {
			$term_taxonomy_id = $translated_term['term_taxonomy_id'];

			$original_ttid = $sitepress->get_original_element_id( $term_taxonomy_id, 'tax_' . $taxonomy );

			$original_tax_sql      = "SELECT * FROM {$wpdb->term_taxonomy} WHERE taxonomy=%s AND term_taxonomy_id = %d";
			$original_tax_prepared = $wpdb->prepare( $original_tax_sql, array( $taxonomy, $original_ttid ) );
			$original_tax          = $wpdb->get_row( $original_tax_prepared );

			do_action( 'icl_save_term_translation', $original_tax, $translated_term );
		}
	}

	/**
	 * Prints a hidden div, containing the list of allowed terms for a post type in each language.
	 * This is used to only display the correct categories and tags in the quick-edit fields of the post table.
	 *
	 * @param string                   $column_name
	 * @param string|string[]|\WP_Post $post_type
	 */
	public static function quick_edit_terms_removal( $column_name, $post_type ) {
		/** @var SitePress $sitepress */
		global $sitepress, $wpdb;
		if ( $column_name == 'icl_translations' ) {
			$taxonomies                     = array_filter(
				get_object_taxonomies( $post_type ),
				array(
					$sitepress,
					'is_translated_taxonomy',
				)
			);
			$terms_by_language_and_taxonomy = array();

			if ( ! empty( $taxonomies ) ) {
				$res = $wpdb->get_results(
					"	SELECT language_code, taxonomy, term_id FROM {$wpdb->term_taxonomy} tt
 										JOIN {$wpdb->prefix}icl_translations wpml_translations
 											ON wpml_translations.element_id = tt.term_taxonomy_id
 												AND wpml_translations.element_type = CONCAT('tax_', tt.taxonomy)
                                        WHERE tt.taxonomy IN (" . wpml_prepare_in( $taxonomies ) . ' )'
				);
			} else {
				$res = array();
			}

			foreach ( $res as $term ) {
				$lang                                    = $term->language_code;
				$tax                                     = $term->taxonomy;
				$terms_by_language_and_taxonomy[ $lang ] = isset( $terms_by_language_and_taxonomy[ $lang ] ) ? $terms_by_language_and_taxonomy[ $lang ] : array();
				$terms_by_language_and_taxonomy[ $lang ][ $tax ]   = isset( $terms_by_language_and_taxonomy[ $lang ][ $tax ] ) ? $terms_by_language_and_taxonomy[ $lang ][ $tax ] : array();
				$terms_by_language_and_taxonomy[ $lang ][ $tax ][] = $term->term_id;
			}
			$terms_json = wp_json_encode( $terms_by_language_and_taxonomy );
			echo $terms_json ? '<div id="icl-terms-by-lang" style="display: none;">' . wp_kses_post( $terms_json ) . '</div>' : '';
		}
	}

	/**
	 * Creates a new term from an argument array.
	 *
	 * @param array $args
	 * @return array|bool
	 * Returns either an array containing the term_id and term_taxonomy_id of the term resulting from this database
	 * write or false on error.
	 */
	public static function create_new_term( $args ) {
		global $wpdb, $sitepress;

		/** @var string $taxonomy */
		$taxonomy = false;
		/** @var string $lang_code */
		$lang_code = false;
		/**
		 * Sets whether translations of posts are to be updated by the newly created term,
		 * should they be missing a translation still.
		 * During debug actions designed to synchronise post and term languages this should not be set to true,
		 * doing so introduces the possibility of removing terms from posts before switching
		 * them with their translation in the correct language.
		 *
		 * @var  bool
		 */
		$sync = false;

		extract( $args, EXTR_OVERWRITE );

		require_once dirname( __FILE__ ) . '/wpml-update-term-action.class.php';

		$new_term_action = new WPML_Update_Term_Action( $wpdb, $sitepress, $args );
		$new_term        = $new_term_action->execute();

		if ( $sync && $new_term && $taxonomy && $lang_code ) {
			self::sync_taxonomy_terms_language( $taxonomy );
		}

		return $new_term;
	}

	/**
	 * @param array<mixed> $args
	 * Creates an automatic translation of a term, the name of which is set as "original" . @ "lang_code" and the slug of which is set as "original_slug" . - . "lang_code".
	 *
	 * @return array|bool
	 */
	public function create_automatic_translation( $args ) {
		global $sitepress;

		$term                = false;
		$lang_code           = false;
		$taxonomy            = '';
		$original_id         = false;
		$original_tax_id     = false;
		$trid                = false;
		$original_term       = false;
		$update_translations = false;
		$source_language     = null;

		extract( $args, EXTR_OVERWRITE );

		if ( $trid && ! $original_id ) {
			$original_tax_id = $sitepress->get_original_element_id_by_trid( $trid );
			$original_term   = get_term_by( 'term_taxonomy_id', $original_tax_id, $taxonomy, OBJECT, 'no' );
		}

		if ( $original_id && ! $original_tax_id ) {
			$original_term = get_term( $original_id, $taxonomy, OBJECT, 'no' );
			if ( isset( $original_term['term_taxonomy_id'] ) ) {
				$original_tax_id = $original_term['term_taxonomy_id'];
			}
		}

		if ( ! $trid ) {
			$trid = $sitepress->get_element_trid( $original_tax_id, 'tax_' . $taxonomy );
		}

		if ( ! $source_language ) {
			$source_language = $sitepress->get_source_language_by_trid( $trid );
		}

		$existing_translations = $sitepress->get_element_translations( $trid, 'tax_' . $taxonomy );
		if ( $lang_code && isset( $existing_translations[ $lang_code ] ) ) {
			$new_translated_term = false;
		} else {

			if ( ! $original_term ) {
				if ( $original_id ) {
					$original_term = get_term( $original_id, $taxonomy, OBJECT, 'no' );
				} elseif ( $original_tax_id ) {
					$original_term = get_term_by( 'term_taxonomy_id', $original_tax_id, $taxonomy, OBJECT, 'no' );
				}
			}
			$translated_slug = false;

			if ( ! $term && isset( $original_term->name ) ) {
				$term = $original_term->name;

				/**
				 * @deprecated use 'wpml_duplicate_generic_string' instead, with the same arguments
				 */
				$term = apply_filters(
					'icl_duplicate_generic_string',
					$term,
					$lang_code,
					array(
						'context'   => 'taxonomy',
						'attribute' => $taxonomy,
						'key'       => $original_term->term_id,
					)
				);

				$term = apply_filters(
					'wpml_duplicate_generic_string',
					$term,
					$lang_code,
					array(
						'context'   => 'taxonomy',
						'attribute' => $taxonomy,
						'key'       => $original_term->term_id,
					)
				);
			}
			if ( isset( $original_term->slug ) ) {
				$translated_slug = $original_term->slug;

				/**
				 * @deprecated use 'wpml_duplicate_generic_string' instead, with the same arguments
				 */
				$translated_slug = apply_filters(
					'icl_duplicate_generic_string',
					$translated_slug,
					$lang_code,
					array(
						'context'   => 'taxonomy_slug',
						'attribute' => $taxonomy,
						'key'       => $original_term->term_id,
					)
				);

				$translated_slug = apply_filters(
					'wpml_duplicate_generic_string',
					$translated_slug,
					$lang_code,
					array(
						'context'   => 'taxonomy_slug',
						'attribute' => $taxonomy,
						'key'       => $original_term->term_id,
					)
				);

				$translated_slug = is_string( $lang_code )
					? self::term_unique_slug( $translated_slug, $taxonomy, $lang_code )
					: $translated_slug;
			}
			$new_translated_term = false;
			if ( $term ) {
				$new_term_args = array(
					'term'                => $term,
					'slug'                => $translated_slug,
					'taxonomy'            => $taxonomy,
					'lang_code'           => $lang_code,
					'original_tax_id'     => $original_tax_id,
					'update_translations' => $update_translations,
					'trid'                => $trid,
					'source_language'     => $source_language,
				);

				$new_translated_term = self::create_new_term( $new_term_args );
			}
		}

		return $new_translated_term;
	}

	/**
	 * @param string $taxonomy
	 *
	 * Sets all taxonomy terms to the correct language on each post, having at least one term from the taxonomy.
	 */
	public static function sync_taxonomy_terms_language( $taxonomy ) {
		$all_posts_in_taxonomy = get_posts( array( 'tax_query' => array( 'taxonomy' => $taxonomy ) ) );

		foreach ( $all_posts_in_taxonomy as $post_in_taxonomy ) {
			self::sync_post_and_taxonomy_terms_language( $post_in_taxonomy->ID, $taxonomy );
		}
	}

	/**
	 * @param int $post_id
	 *
	 * Sets all taxonomy terms ot the correct language for a given post.
	 */
	public static function sync_post_terms_language( $post_id ) {

		$taxonomies = get_taxonomies();

		foreach ( $taxonomies as $taxonomy ) {
			self::sync_post_and_taxonomy_terms_language( $post_id, $taxonomy );
		}
	}

	/**
	 * @param int    $post_id
	 * @param string $taxonomy
	 * Synchronizes a posts taxonomy term's languages with the posts language for all translations of the post.
	 */
	public static function sync_post_and_taxonomy_terms_language( $post_id, $taxonomy ) {
		global $sitepress;

		$post                     = get_post( $post_id );
		$post_type                = $post->post_type;
		$post_trid                = $sitepress->get_element_trid( $post_id, 'post_' . $post_type );
		$post_translations        = $sitepress->get_element_translations( $post_trid, 'post_' . $post_type );
		$terms_from_original_post = wp_get_post_terms( $post_id, $taxonomy );

		if ( is_wp_error ( $terms_from_original_post ) ) {
			return;
		}

		$is_original = true;

		if ( $sitepress->get_original_element_id( $post_id, 'post_' . $post_type ) != $post_id ) {
			$is_original = false;
		}

		foreach ( $post_translations as $post_language => $translated_post ) {

			$translated_post_id = $translated_post->element_id;
			if ( ! $translated_post_id ) {
				continue;
			}
			$terms_from_translated_post = wp_get_post_terms( $translated_post_id, $taxonomy );

			if ( is_wp_error ( $terms_from_translated_post ) ) {
				continue;
			}

			if ( $is_original ) {
				$duplicates = $sitepress->get_duplicates( $post_id );
				if ( in_array( $translated_post_id, $duplicates ) ) {
					$terms = array_merge( $terms_from_original_post, $terms_from_translated_post );
				} else {
					$terms = $terms_from_translated_post;
				}
			} else {
				$terms = $terms_from_translated_post;
			}
			foreach ( (array) $terms as $term ) {
				$term_original_tax_id          = $term->term_taxonomy_id;
				$original_term_language_object = $sitepress->get_element_language_details( $term_original_tax_id, 'tax_' . $term->taxonomy );
				if ( $original_term_language_object && isset( $original_term_language_object->language_code ) ) {
					$original_term_language = $original_term_language_object->language_code;
				} else {
					$original_term_language = $post_language;
				}
				if ( $original_term_language != $post_language ) {
					$term_trid        = $sitepress->get_element_trid( $term_original_tax_id, 'tax_' . $term->taxonomy );
					$translated_terms = $sitepress->get_element_translations( $term_trid, 'tax_' . $term->taxonomy, false, false, true );

					$term_id = $term->term_id;
					wp_remove_object_terms( $translated_post_id, (int) $term_id, $taxonomy );

					if ( isset( $translated_terms[ $post_language ] ) ) {
						$term_in_correct_language = $translated_terms[ $post_language ];
						wp_set_post_terms( $translated_post_id, array( (int) $term_in_correct_language->term_id ), $taxonomy, true );
					}

					if ( isset( $term->term_taxonomy_id ) ) {
						wp_update_term_count( $term->term_taxonomy_id, $taxonomy );
					}
				}
				wp_update_term_count( $term_original_tax_id, $taxonomy );
			}
		}
	}

	/**
	 * @param int    $post_id    Object ID.
	 * @param array  $terms      An array of object terms.
	 * @param array  $tt_ids     An array of term taxonomy IDs.
	 * @param string $taxonomy   Taxonomy slug.
	 * @param bool   $append     Whether to append new terms to the old terms.
	 * @param array  $old_tt_ids Old array of term taxonomy IDs.
	 */
	public static function set_object_terms_action( $post_id, $terms, $tt_ids, $taxonomy, $append, $old_tt_ids ) {
		global $sitepress;

		// TODO: [WPML 3.2] We have a better way to check if the post is an external type (e.g. Package).
		if ( get_post( $post_id ) ) {
			self::set_tags_in_proper_language( $post_id, $tt_ids, $taxonomy, $old_tt_ids );

			if ( $sitepress->get_setting( 'sync_post_taxonomies' ) ) {
				$term_actions_helper = $sitepress->get_term_actions_helper();
				$term_actions_helper->added_term_relationships( $post_id );
			}
		}
	}

	/**
	 * @param int    $post_id Object ID.
	 * @param array  $tt_ids An array of term taxonomy IDs.
	 * @param string $taxonomy Taxonomy slug.
	 * @param array  $old_tt_ids Old array of term taxonomy IDs.
	 * @param bool   $isBulkEdit
	 */
	private static function set_tags_in_proper_language( $post_id, $tt_ids, $taxonomy, $old_tt_ids ) {
		$isEditAction = isset( $_POST['action'] ) && ( 'editpost' === $_POST['action'] || 'inline-save' === $_POST['action'] );
		$isBulkEdit   = isset( $_REQUEST['bulk_edit'] );
		if ( $isEditAction || $isBulkEdit ) {
			$tt_ids = array_map( 'intval', $tt_ids );
			$tt_ids = array_diff( $tt_ids, $old_tt_ids );
			self::quick_edited_post_terms( $post_id, $taxonomy, $tt_ids );
		}
	}

	/**
	 * @param int    $post_id
	 * @param string $taxonomy
	 * @param array  $changed_ttids
	 *
	 * Running this function will remove certain issues arising out of bulk adding of terms to posts of various languages.
	 * This case can result in situations in which the WP Core functionality adds a term to a post, before the language assignment
	 * operations of WPML are triggered. This leads to states in which terms can be assigned to a post even though their language
	 * differs from that of the post.
	 * This function behaves between hierarchical and flat taxonomies. Hierarchical terms from the wrong taxonomy are simply removed
	 * from the post. Flat terms are added with the same name but in the correct language.
	 * For flat terms this implies either the use of the existing term or the creation of a new one.
	 * This function uses wpdb queries instead of the WordPress API, it is therefore save to be run out of
	 * any language setting.
	 */
	public static function quick_edited_post_terms( $post_id, $taxonomy, $newlyAddedTermIds ) {
		global $wpdb, $sitepress, $wpml_post_translations;

		$postLang = $wpml_post_translations->get_element_lang_code( $post_id ) ?: Obj::prop( 'icl_post_language', $_POST );
		if ( ! $sitepress->is_translated_taxonomy( $taxonomy ) || ! ( $postLang ) ) {
			return;
		}

		$sql               = "SELECT element_id FROM {$wpdb->prefix}icl_translations WHERE language_code = %s AND element_type = %s";
		$termIdsInPostLang = $wpdb->get_col( $wpdb->prepare( $sql, $postLang, 'tax_' . $taxonomy ) );
		$termIdsInPostLang = Fns::map( \WPML\FP\Cast::toInt(), $termIdsInPostLang );

		$newlyCreatedTermIds = [];

		$isInPostLang = Lst::includes( Fns::__, $termIdsInPostLang );

		if ( ! is_taxonomy_hierarchical( $taxonomy ) ) {
			$getTermInPostLang = Obj::prop( 'idInPostLang' );

			$createTermIfNotExists = Logic::ifElse( $getTermInPostLang, Fns::identity(), self::createTerm( $taxonomy, $postLang ) );

			$updateOrDeleteTermInPost = Logic::ifElse(
				$getTermInPostLang,
				self::updatePostTaxonomy( $post_id ),
				pipe( Obj::prop( 'id' ), self::deletePostTaxonomy( $post_id ) )
			);

			$newlyCreatedTermIds = \wpml_collect( $newlyAddedTermIds )
				->reject( $isInPostLang )
				->map( self::appendTermName() )
				->map( self::appendTermIdCounterpartInPostLang( $termIdsInPostLang, $taxonomy ) )
				->map( $createTermIfNotExists )
				->map( $updateOrDeleteTermInPost )
				->all();
		} else {
			\wpml_collect( $newlyAddedTermIds )->reject( $isInPostLang )->each( self::deletePostTaxonomy( $post_id ) );
		}

		// Update term counts manually here, since using sql, will not trigger the updating of term counts automatically.
		wp_update_term_count( array_merge( $newlyAddedTermIds, $newlyCreatedTermIds ), $taxonomy );
	}

	/**
	 * @param int $postId
	 *
	 * @return Closure
	 */
	private static function deletePostTaxonomy( $postId ) {
		return function ( $termId ) use ( $postId ) {
			global $wpdb;

			$wpdb->delete(
				$wpdb->term_relationships,
				[
					'object_id'        => $postId,
					'term_taxonomy_id' => $termId,
				]
			);
		};
	}

	/**
	 * @return Closure
	 */
	private static function appendTermName() {
		return function ( $termId ) {
			global $wpdb;

			$sql      = "SELECT t.name FROM {$wpdb->terms} AS t JOIN {$wpdb->term_taxonomy} AS tt ON t.term_id = tt.term_id WHERE tt.term_taxonomy_id=%d";
			$termName = $wpdb->get_var( $wpdb->prepare( $sql, $termId ) );

			return [ 'id' => $termId, 'name' => $termName ];
		};
	}

	/**
	 * @param array $termIdsInPostLang
	 * @param string $taxonomy
	 *
	 * @return Closure
	 */
	private static function appendTermIdCounterpartInPostLang( $termIdsInPostLang, $taxonomy ) {
		return function ( $termData ) use ( $termIdsInPostLang, $taxonomy ) {
			global $wpdb;
			$idInPostLang = false;

			if ( count( $termIdsInPostLang ) ) {
				$in = wpml_prepare_in( $termIdsInPostLang, '%d' );

				$sql = "
					SELECT tt.term_taxonomy_id FROM {$wpdb->terms} AS t
					JOIN {$wpdb->term_taxonomy} AS tt ON t.term_id = tt.term_id
					WHERE t.name=%s AND tt.taxonomy=%s AND tt.term_taxonomy_id IN ({$in})
				";

				$idInPostLang = $wpdb->get_var( $wpdb->prepare( $sql, $termData['name'], $taxonomy ) );
			}

			return Obj::assoc( 'idInPostLang', $idInPostLang, $termData );
		};
	}

	/**
	 * @param string $taxonomy
	 * @param string $postLang
	 *
	 * @return Closure
	 */
	private static function createTerm( $taxonomy, $postLang ) {
		return function ( $termData ) use ( $taxonomy, $postLang ) {
			global $sitepress;

			$idInCorrectId = false;
			$newTerm       = wp_insert_term( $termData['name'], $taxonomy, [ 'slug' => self::term_unique_slug( sanitize_title( $termData['name'] ), $taxonomy, $postLang ) ] );
			if ( isset( $newTerm['term_taxonomy_id'] ) ) {
				$idInCorrectId = $newTerm['term_taxonomy_id'];
				$trid          = $sitepress->get_element_trid( $termData['id'], 'tax_' . $taxonomy );
				$sitepress->set_element_language_details( $idInCorrectId, 'tax_' . $taxonomy, $trid, $postLang );
			}

			return Obj::assoc( 'idInPostLang', $idInCorrectId, $termData );
		};
	}

	/**
	 * @param int $postId
	 *
	 * @return Closure
	 */
	private static function updatePostTaxonomy( $postId ) {
		return function ( $termData ) use ( $postId ) {
			global $wpdb;

			$wpdb->update(
				$wpdb->term_relationships,
				[ 'term_taxonomy_id' => $termData['idInPostLang'] ],
				[
					'object_id'        => $postId,
					'term_taxonomy_id' => $termData['id'],
				]
			);
		};
	}

	/**
	 * Returns an array of all terms, that have a language suffix on them.
	 * This is used by troubleshooting functionality.
	 *
	 * @return array
	 */
	public static function get_all_terms_with_language_suffix() {
		global $wpdb;

		$lang_codes = $wpdb->get_col( "SELECT code FROM {$wpdb->prefix}icl_languages" );

		/*
		 Build the expression to find all potential candidates for renaming.
		 * These must have the part "<space>@lang_code<space>" in them.
		 */

		$where_parts = array();

		foreach ( $lang_codes as $key => $code ) {
			$where_parts[ $key ] = "t.name LIKE '" . '% @' . esc_sql( $code ) . "%'";
		}

		$where = '(' . join( ' OR ', $where_parts ) . ')';

		$terms_with_suffix = $wpdb->get_results( "SELECT t.name, t.term_id, tt.taxonomy FROM {$wpdb->terms} AS t JOIN {$wpdb->term_taxonomy} AS tt ON t.term_id = tt.term_id WHERE {$where}" );

		$terms = array();

		foreach ( $terms_with_suffix as $term ) {

			if ( $term->name == WPML_Troubleshooting_Terms_Menu::strip_language_suffix( $term->name ) ) {
				continue;
			}

			$term_id = $term->term_id;

			$term_taxonomy_label = $term->taxonomy;

			$taxonomy = get_taxonomy( $term->taxonomy );

			if ( $taxonomy && isset( $taxonomy->labels ) && isset( $taxonomy->labels->name ) ) {
				$term_taxonomy_label = $taxonomy->labels->name;
			}

			if ( isset( $terms[ $term_id ] ) && isset( $terms[ $term_id ]['taxonomies'] ) ) {
				if ( ! in_array( $term_taxonomy_label, $terms[ $term_id ]['taxonomies'] ) ) {
					$terms[ $term_id ]['taxonomies'][] = $term_taxonomy_label;
				}
			} else {
				$terms[ $term_id ] = array(
					'name'       => $term->name,
					'taxonomies' => array( $term_taxonomy_label ),
				);
			}
		}

		return $terms;
	}
}
