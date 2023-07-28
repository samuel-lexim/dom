<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package dom
 */
?>

<div class="post_detail_page">
  <div class="top_post_detail_inner w1328">

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      <div class="_top_content">
        <header class="entry-header">
          <?php
          if (is_singular()) :
            the_title('<h1 class="entry-title s24_42 fw-700"><span class="_underline">', '</span></h1>');
          else :
            the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
          endif;

          if ('post' === get_post_type()) :
            ?>
            <div class="entry-meta" style="display: none">
              <?php
              dom_posted_on();
              dom_posted_by();
              ?>
            </div>
          <?php endif; ?>
        </header>

        <?php // dom_post_thumbnail(); ?>

        <div class="entry-content s16_20 fw-400">
          <?php
          the_content(
            sprintf(
              wp_kses(
              /* translators: %s: Name of current post. Only visible to screen readers */
                __('Continue reading<span class="screen-reader-text"> "%s"</span>', 'dom'),
                array(
                  'span' => array(
                    'class' => array(),
                  ),
                )
              ),
              wp_kses_post(get_the_title())
            )
          );

          //    wp_link_pages(
          //      array(
          //        'before' => '<div class="page-links">' . esc_html__('Pages:', 'dom'),
          //        'after' => '</div>',
          //      )
          //    );
          ?>
        </div>
      </div>


      <?php /*
      <footer class="entry-footer">
        <?php dom_entry_footer(); ?>
      </footer>
      */ ?>

    </article>

    <?php
    $bg = getDefaultImg('bg.png');
    $current_post_id = get_the_ID(); // Get the ID of the current post
    $args_posts = array(
      'post_type' => 'post',
      'posts_per_page' => 12,
      'orderby' => 'publish_date',
      'order' => 'DESC',
      'post__not_in' => array($current_post_id), // Exclude the current post ID
    );
    $postsList = new WP_Query($args_posts);
    ?>

    <?php if ($postsList->have_posts()) { ?>
      <p class="s24_42 fw-700" style="text-align: center">WE THOUGHT YOU MIGHT LIKE</p>
    <?php } ?>

  </div>

  <div class="bottom_slider">

    <?php if ($postsList->have_posts()) { ?>
      <div class="w1328">
        <div class="bottom_slider_inner ">
          <div class="top_arrows_slick defaultSlick">

            <?php while ($postsList->have_posts()) {
              $postsList->the_post();
              $link = esc_url(get_permalink());
              $excerpt = get_the_excerpt();
              $excerpt = wp_trim_words($excerpt, 24, '...');
              ?>

              <div class="_post_item">
                <div class="_post_item_inner">
                  <?php echo get_the_post_thumbnail(); ?>
                  <p class="s20 _title fw-600"><?= get_the_title() ?></p>
                  <p class="s16 _description fw-300"><?= $excerpt ?></p>
                  <?php
                  $txt = translate('View Event');
                  echo render_button($txt, $link, '_view', true);
                  ?>
                </div>
              </div>

            <?php }
            wp_reset_postdata(); // Reset the post data after the loop
            ?>

          </div>
        </div>
      </div>
      <div class="_greenBg" style="background-image: url(<?= $bg ?>)"></div>
    <?php } ?>

  </div>

</div>