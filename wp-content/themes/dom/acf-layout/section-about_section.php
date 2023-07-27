<?php
$postId = get_the_ID();

if (isset($args) && $args) {
  $class = '';
  $bg = getDefaultImg('bg.png');
  ?>

  <div class="about_section">

    <div class="top_about_section">
      <div class="top_about_inner w1328">
        <?php if ($args['right_text']) { ?>
          <div class="about_right_text"><?= $args['right_text'] ?></div>
        <?php } ?>

        <?php if ($args['left_image']) { ?>
          <img class="about_left_img _img" src="<?= $args['left_image'] ?>" alt=""/>
        <?php } ?>
      </div>
    </div>

    <div class="bottom_about_section" style="background-image: url(<?= $bg ?>)">
      <div class="bottom_about_inner w1328">
        <?php if ($args['left_text']) { ?>
          <div class="about_left_text s24_28"><?= $args['left_text'] ?></div>
        <?php } ?>

        <?php if ($args['right_images']) { ?>
          <div class="aboutGallery">
            <?php foreach ($args['right_images'] as $imgSrc) { ?>
              <img class="_img" src="<?= $imgSrc ?>" alt=""/>
            <?php } ?>
          </div>
        <?php } ?>

      </div>
    </div>

  </div>

<?php } ?>