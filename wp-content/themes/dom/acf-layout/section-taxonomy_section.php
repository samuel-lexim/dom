<?php
$postId = get_the_ID();

if ( isset( $args ) && $args ) { ?>

    <div class="taxonomy_section">
        <div class="LR_pad top_pad">
            <div class="_inner">
				<?php if ( $args['heading'] ) { ?>
                    <h2 class="_section_title s28 fw700 blue"><?= $args['heading'] ?></h2>
				<?php } ?>

				<?php
				if ( $args['taxonomy'] ) {
					$taxonomyType = $args['taxonomy'];
					$categories   = get_terms( [
						'taxonomy'   => $taxonomyType,
						'hide_empty' => false,
					] );

					if ( is_array( $categories ) && count( $categories ) > 0 ) {
						?>
                        <div class="taxonomy_section_list">
							<?php foreach ( $categories as $cat ) {
								$category_image = get_field( 'category_image_square', $cat );
								if ( ! $category_image ) {
									$category_image = get_field( 'category_image', $cat );
								}
								$alt = '';
								if ($category_image) {
									$alt = $category_image['alt'] ?? $category_image['title'];
									$cat_img_src = $category_image['url'];
								} else {
								    $cat_img_src = getNoImageSrc();
								}
								$catLink =  get_category_link($cat);
								?>
                                <div class="taxonomy_section_list_item">
                                    <a href="<?= $catLink ?>" data-slug="<?= $cat->slug ?>">
                                        <div class="_cat_img" style="background-image: url('<?= $cat_img_src ?>')"></div>
                                        <h3 class="_heading s18"><?= $cat->name ?></h3>
                                    </a>
                                </div>
							<?php } ?>

                        </div>
					<?php } ?>
				<?php } ?>
            </div>
        </div>

    </div>

<?php } ?>