<?php
$postId = get_the_ID();

if (isset($args) && $args) {
  $class = '';
  ?>

  <div class="content_2images_section">

    <div class="content_2images_inner w1328">
      <?php if ($args['top_content']) { ?>
        <div class="top_content s24_28"><?= $args['top_content'] ?></div>
      <?php } ?>

      <?php if ($args['image_list']) { ?>
        <div class="image_list">
          <?php foreach ($args['image_list'] as $imgSrc) { ?>
            <img class="_img" src="<?= $imgSrc ?>" alt=""/>
          <?php } ?>
        </div>
      <?php } ?>
    </div>


  </div>

<?php } ?>