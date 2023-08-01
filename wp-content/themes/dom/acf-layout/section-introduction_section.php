<?php
$postId = get_the_ID();

if (isset($args) && $args) {
  $class = '';
  ?>

  <div class="introduction_section">
    <?php
    $bg = getDefaultImg('bg.png');
    ?>

    <div class="green_section" style="background-image: url(<?= $bg ?>)">

      <div class="green_section_inner w1328">
        <div class="_left">
          <h1 class="_title fw700">
            <?php if ($args['white_text']) { ?>
              <span><?= $args['white_text'] ?></span>
            <?php } ?>
            <br/>
            <?php if ($args['yellow_text']) { ?>
              <span class="colorGolden"><?= $args['yellow_text'] ?></span>
            <?php } ?>
          </h1>

          <?php if ($args['show_booking_button']) {
            echo render_button('Booking', getPreLink() . 'booking', 's16 _yellow _lightGreenTxt h40', true);
          } ?>
        </div>

        <div class="_right">
          <?php if ($args['gallery_repeater']) { ?>

            <div class="introductionSlider">

              <?php foreach ($args['gallery_repeater'] as $img) { ?>

                <div class="introductionSlideItem">
                  <?php if ($img['image']) { ?>
                    <img class="_img" src="<?= $img['image'] ?>" alt="<?= $img['title'] ?>"/>
                  <?php } ?>
                  <?php if ($img['title']) { ?>
                    <h2 class="_title s18_24 colorGolden moul"><?= $img['title'] ?></h2>
                  <?php } ?>
                </div>

              <?php } ?>

            </div>

          <?php } ?>
        </div>
      </div>

    </div>


    <?php if ($args['linen_section']) { ?>

      <div class="line_section">

        <div class="line_section_inner w1328">
          <div class="color_title moul s32_48 colorGreenLight">
            <?php if ($args['linen_section']['pre_heading']) { ?>
              <span class="pre_yellow colorGolden"><?= $args['linen_section']['pre_heading'] ?></span>
            <?php } ?>

            <?php if ($args['linen_section']['green_heading']) { ?>
              <span class="_green"><?= $args['linen_section']['green_heading'] ?></span>
            <?php } ?>
          </div>

          <?php if ($args['linen_section']['content']) { ?>
            <div class="_content fw-400 s24_28"><?= $args['linen_section']['content'] ?></div>
          <?php } ?>
        </div>
      </div>

    <?php } ?>

  </div>

<?php } ?>