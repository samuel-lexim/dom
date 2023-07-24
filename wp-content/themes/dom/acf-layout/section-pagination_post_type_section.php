<?php
$postId = get_the_ID();

if ( isset( $args ) && $args ) { ?>

    <div class="pagination_section top_pad <?= $args["bg_color"] ?>">
        <div class="LR_pad">

            <div class="_inner">
				<?php if ( $args['title'] ) { ?>
                    <h2 class="_title s30 fw700 blue"><?= $args['title'] ?></h2>
				<?php } ?>

				<?php if ( $args['summary'] ) { ?>
                    <div class="_summary s24 fw400"><?= $args['summary'] ?></div>
				<?php } ?>

				<?php if ( $args['post_type'] ) {
					$paged        = get_query_var( 'paged' ) ? ( get_query_var( 'paged' ) - 1 ) : 0;
					$postsPerPage = $args['posts_per_page'] ?: 12;
					$postOffset   = $paged * $postsPerPage;
					$args_posts   = array(
						'post_type'      => $args['post_type'],
						'offset'         => $postOffset,
						'posts_per_page' => $postsPerPage,
						'orderby'        => 'publish_date',
						'order'          => 'DESC'
					);
					$postsList    = new WP_Query( $args_posts );

					if ( $postsList->have_posts() ) { ?>
                        <div class="listing-news-wrap">
							<?php while ( $postsList->have_posts() ) :
								$postsList->the_post();
								get_template_part( 'template-parts/grid_item', $args['post_type'] );
							endwhile;
							?>
                        </div>

                        <div class="pagination _right">
							<?php
							echo paginate_links( array(
								'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
								'total'        => $postsList->max_num_pages,
								'current'      => max( 1, get_query_var( 'paged' ) ),
								'format'       => '?paged=%#%',
								'show_all'     => false,
								'type'         => 'plain',
								'end_size'     => 2,
								'mid_size'     => 1,
								'prev_next'    => true,
								'prev_text'    => '<i></i>',
								'next_text'    => '<i></i>',
								'add_args'     => false,
								'add_fragment' => '',
							) );
							?>
                        </div>

						<?php
                        wp_reset_query();
						wp_reset_postdata();
						?>
					<?php }

				}
				?>
            </div>

        </div>
    </div>

<?php } ?>