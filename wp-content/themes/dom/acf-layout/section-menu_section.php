<?php
$postId = get_the_ID();

if (isset($args) && $args) {
  $class = '';
  $bg = getDefaultImg('bg.png');

  ?>

  <div class="menu_section" style="background-image: url(<?= $bg ?>)">
    <div class="menu_section_inner w1328">

      <div class="tabControl">
        <div class="foodTab _tab activated" data-id="FoodTab">
          <img class="" src="<?= getDefaultImg('Food.png') ?>" alt="Food"/>
        </div>

        <div class="drinkTab _tab" data-id="DrinkTab">
          <img class="" src="<?= getDefaultImg('Drink.png') ?>" alt="Drink"/>
        </div>
      </div>

      <div class="tabContent">
        <div class="_content activated" id="FoodTab">
          <?php
          if ($args['food_menu'] && $args['food_menu']['menu_slider']) { ?>
            <div class="menu_slider topGreenArrow">
              <?php foreach ($args['food_menu']['menu_slider'] as $menu) { ?>
                <div class="menu_slider_item">
                  <?php if ($menu['mobile']) { ?>
                    <img class="_mobile" src="<?= $menu['mobile'] ?>" />
                  <?php } ?>
                  <?php if ($menu['ipad']) { ?>
                    <img class="_ipad" src="<?= $menu['ipad'] ?>" />
                  <?php } ?>
                  <?php if ($menu['desktop']) { ?>
                    <img class="_desktop" src="<?= $menu['desktop'] ?>" />
                  <?php } ?>
                </div>
              <?php } ?>
            </div>
          <?php } ?>

        </div>

        <div class="_content" id="DrinkTab">

          <?php
          if ($args['drink_menu'] && $args['drink_menu']['menu_slider']) { ?>
            <div class="menu_slider topGreenArrow">
              <?php foreach ($args['drink_menu']['menu_slider'] as $menu) { ?>
                <div class="menu_slider_item">
                  <?php if ($menu['mobile']) { ?>
                    <img class="_mobile" src="<?= $menu['mobile'] ?>" />
                  <?php } ?>
                  <?php if ($menu['ipad']) { ?>
                    <img class="_ipad" src="<?= $menu['ipad'] ?>" />
                  <?php } ?>
                  <?php if ($menu['desktop']) { ?>
                    <img class="_desktop" src="<?= $menu['desktop'] ?>" />
                  <?php } ?>
                </div>
              <?php } ?>
            </div>
          <?php } ?>

        </div>

      </div>

    </div>
  </div>

<?php } ?>