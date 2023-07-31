<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package dom
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="https://gmpg.org/xfn/11">

  <!-- Google Font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Moul&display=swap" rel="stylesheet">

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
  <?php /*
  <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'dom'); ?></a>
  */ ?>

  <header id="masthead" class="site-header w1328">

    <?php
    $bodyClass = get_body_class();
    $transparentHeaderList = ['page-menu'];
    $isTransparentHeader = array_intersect($transparentHeaderList, $bodyClass);
    if (!empty($isTransparentHeader)) {
      // Add custom class 'transparent' to body tag in WordPress
      echo '<script>document.body.classList.add("transparent");</script>';
    }
    ?>

    <!-- logo -->
    <div class="site-branding">
      <?php
      if (is_front_page() || !empty($isTransparentHeader)) { ?>
        <span class="custom-logo-link" rel="home" aria-current="page">
          <?php if (!empty($isTransparentHeader)) { ?>
            <a href="<?= esc_url(home_url('/')) ?>">
              <img src="<?= getDefaultImg('logo-white.png') ?>" class="custom-logo"
                   alt="Dom The Wine Bistro" decoding="async"/>
            </a>
          <?php } else { ?>
          <img src="<?= getDefaultImg('logo-white.png') ?>" class="custom-logo"
               alt="Dom The Wine Bistro" decoding="async"/>
          <?php } ?>
        </span>
      <?php } else {
        the_custom_logo();
      }
      ?>

      <?php /*
      $dom_description = get_bloginfo('description', 'display');
      if ($dom_description || is_customize_preview()) {
        ?>
        <p class="site-description"><?= $dom_description;  ?></p>
      <?php } */ ?>
    </div>

    <nav id="site-navigation" class="main-navigation">
      <?php /*
      <button style="display: none" class="menu-toggle" id="PrimaryMenuButton" aria-controls="primary-menu" aria-expanded="false">
        <1?php esc_html_e('Primary Menu', 'dom'); ?>
      </button>
      */ ?>

      <div class="closeMenu">
        <svg id="CloseMenuButton" fill="none" viewBox="0 0 40 40" width="40" height="40" xmlns="http://www.w3.org/2000/svg">
          <g clip-path="url(#a)" fill="#fff">
            <path
              d="m1.2507 39.167c-0.08155-0.0012-0.16098-0.0262-0.22843-0.0721-0.067442-0.0458-0.11995-0.1105-0.151-0.1859s-0.039291-0.1583-0.023691-0.2383c0.015601-0.0801 0.054354-0.1538 0.11145-0.212l37.5-37.5c0.0785-0.07846 0.1849-0.12254 0.2958-0.12254 0.111 0 0.2174 0.044079 0.2959 0.12254 0.0784 0.078456 0.1225 0.18488 0.1225 0.29584s-0.0441 0.21737-0.1225 0.29583l-37.5 37.5c-0.03977 0.0384-0.08678 0.0685-0.13828 0.0885s-0.10648 0.0296-0.16172 0.0282z"/>
            <path
              d="m38.75 39.167c-0.1099-0.0016-0.2147-0.0465-0.2916-0.125l-37.5-37.5c-0.07846-0.07846-0.12254-0.18488-0.12254-0.29583 0-0.11096 0.044078-0.21738 0.12254-0.29584 0.078464-0.07846 0.18487-0.12254 0.29583-0.12254s0.21737 0.044078 0.29583 0.12254l37.5 37.5c0.0606 0.0583 0.1021 0.1335 0.1191 0.2157 0.017 0.0823 0.0087 0.1678-0.0237 0.2453-0.0325 0.0775-0.0876 0.1434-0.1581 0.189-0.0706 0.0456-0.1533 0.0689-0.2373 0.0667z"/>
          </g>
          <defs>
            <clipPath id="a">
              <rect width="40" height="40" fill="#fff"/>
            </clipPath>
          </defs>
        </svg>

      </div>
      <?php wp_nav_menu([
        'menu_id' => 'primary-menu'
      ]); ?>

      <!-- Footer -->

      <?php $footer_copyright = get_field('copyright', 'option'); ?>
      <div class="_footer w1328">
        <p><?= $footer_copyright ?></p>
      </div>
    </nav>

    <div class="rightHeader">
      <?php
      echo render_button('Booking', '#', '_yellow booking s14');
      echo render_button('Menu', getPreLink() . 'menu', 'menu s14');

      // Check if WPML is active
      if (function_exists('icl_get_languages')) {
        // Display the language switcher
        do_action('wpml_add_language_selector');
      }
      ?>

      <!-- Menu Button -->
      <div class="nav-button-wrap">
        <div class="nav-icon" id="NavMenuButton">
          <span class="_small"></span>
          <span></span>
        </div>
      </div>

    </div>


  </header><!-- #masthead -->
