<?php
$postId = get_the_ID();

if ( isset( $args ) && $args ) { ?>

    <div class="list_slider_section">
        <div class="LR_pad top_pad">
            <div class="_inner">
				<?php if ( $args['section_title'] ) { ?>
                    <h2 class="_section_title s28 fw700 blue"><?= $args['section_title'] ?></h2>
				<?php } ?>

				<?php
				if ( $args['post_type'] ) {
					$type       = $args['post_type'];
					$postNumber = $args['posts_number'] ?? 10;
					if ( $postNumber === 'all' ) {
						$postNumber = - 1;
					}

					if ( ! $args['manual_list'] ) {
						$args_posts = array(
							'post_type'      => $type,
							'posts_per_page' => $postNumber,
							'orderby'        => 'publish_date',
							'order'          => 'DESC'
						);
						$postsList  = new WP_Query( $args_posts );
						if ( $postsList->have_posts() ) { ?>
                            <div class="list_slider_slick slick_top_arrow">
								<?php while ( $postsList->have_posts() ) :
									$postsList->the_post(); ?>
                                    <div class="list_slider_slick_item">
										<?php get_template_part( 'template-parts/grid_item', $type ); ?>
                                    </div>
								<?php endwhile; ?>
                            </div>
						<?php }
						wp_reset_query();
						wp_reset_postdata();
						?>

					<?php } else {
						if ( is_array( $args['manual_list'] ) && count( $args['manual_list'] ) > 0 ) { ?>
                            <div class="list_slider_slick slick_top_arrow">

								<?php foreach ( $args['manual_list'] as $news_post ) {
									$link  = esc_url( get_permalink( $news_post ) );
									$type  = get_post_type( $news_post );
									$title = $news_post->post_title;
									$postId = $news_post->ID;

									?>
                                    <div class="list_slider_slick_item">

                                        <div class="grid-item-post" data-id="<?= $postId ?>" data-type="<?= $type ?>">
                                            <a href="<?= $link ?>">
                                                <div class="_inner_post">
                                                    <div class="_thumb">
														<?php get_thumbnail_with_date_label( $news_post, true ); ?>
                                                    </div>

                                                    <h4 class="_name s16 fw700 gray"><?= $title ?></h4>
                                                </div>
                                            </a>
                                        </div>
                                    </div>

								<?php } ?>

                            </div>
						<?php } ?>
					<?php } ?>
				<?php } ?>
            </div>
        </div>

    </div>

<?php } ?>