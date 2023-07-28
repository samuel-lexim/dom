<?php
$postId = get_the_ID();

if (isset($args) && $args) {
  $class = '';
  $bg = getDefaultImg('bg.png');

  ?>

  <div class="event_section post_detail_page">

    <div class="top_post_detail_inner w1328">
      <?php if ($args['top_content']) { ?>
        <div class="_top_content s24_28"><?= $args['top_content'] ?></div>
      <?php } ?>
    </div>

    <div class="bottom_slider">
      <?php if ($args['event_list']) { ?>
        <div class="w1328">
          <div class="bottom_slider_inner ">
            <div class="top_arrows_slick defaultSlick">

              <?php foreach ($args['event_list'] as $article) {
                $link = esc_url(get_permalink($article));
                $excerpt = get_the_excerpt($article);
                $excerpt = wp_trim_words($excerpt, 24, '...');
                ?>

                <div class="_post_item">
                  <div class="_post_item_inner">
                    <?php echo get_the_post_thumbnail($article); ?>
                    <p class="s20 _title fw-600"><?= $article->post_title ?></p>
                    <p class="s16 _description fw-300"><?= $excerpt ?></p>
                    <?php
                    $txt = translate('View Event');
                    echo render_button($txt, $link, '_view', true);
                    ?>
                  </div>
                </div>
              <?php } ?>

            </div>
          </div>
        </div>
      <?php } ?>

      <div class="_greenBg" style="background-image: url(<?= $bg ?>)"></div>
    </div>

  </div>

<?php } ?>