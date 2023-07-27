<?php
$postId = get_the_ID();

if (isset($args) && $args) {
  $class = '';
  ?>

  <div class="gallery_section">

    <div class="gallery_section_inner w1328">
      <?php if ($args['left_content']) { ?>
        <div class="left_content s24_28"><?= $args['left_content'] ?></div>
      <?php } ?>

      <div class="bottom_gallery">
        <?php if ($args['gallery3']) { ?>
          <div class="grid3_slick defaultSlick only_mobile">
            <?php
            $i = 0;
            foreach ($args['gallery3'] as $imgSrc) {
              $i++;
              ?>
              <?php if ($i % 3 === 1) { ?>
                <div class="mansory_grid3">
                <figure class="white_null" role="none"></figure>
              <?php } ?>

              <figure role="none"><img class="_img" src="<?= $imgSrc ?>" alt=""/></figure>

              <?php if ($i % 3 === 0) { ?>
                </div>
              <?php } ?>
              <?php
            } ?>
          </div>
        <?php } ?>

        <?php if ($args['gallery5']) { ?>
          <div class="grid5_slick defaultSlick only_ipad_desktop">
            <?php
            $i = 0;
            foreach ($args['gallery5'] as $imgSrc) {
              $i++;
              ?>
              <?php if ($i % 5 === 1) { ?>
                <div class="mansory_grid5">
                <figure class="white_null" role="none"></figure>
              <?php } ?>

              <figure role="none"><img class="_img" src="<?= $imgSrc ?>" alt=""/></figure>

              <?php if ($i % 5 === 0) { ?>
                </div>
              <?php } ?>
              <?php
            } ?>
          </div>
        <?php } ?>
      </div>
    </div>


  </div>

<?php } ?>