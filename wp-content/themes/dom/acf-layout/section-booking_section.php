<?php
$postId = get_the_ID();

if (isset($args) && $args) {
  $class = '';
  ?>

  <div class="booking_section">
    <div class="w1328">

      <div class="booking_section_inner">
        <?php if ($args['section_title']) { ?>
          <p class="_section_title s28_42 fw-700" style="text-align: center">
            <span class="_underline"><?= $args['section_title'] ?></span>
          </p>
        <?php } ?>

        <?php if ($args['summary']) { ?>
          <div class="_summary s16_20 fw-400" style="text-align: center"><?= $args['summary'] ?></div>
        <?php } ?>


        <?php
        // Replace 'FORM_ID' with the actual ID of your Ninja Form
        $form_id = '1';

        // Check if the Ninja Forms plugin is active and the form ID exists
        if (function_exists('Ninja_Forms')) {
          Ninja_Forms()->display($form_id);
        }
        ?>

      </div>

    </div>
  </div>

<?php } ?>