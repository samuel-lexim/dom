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

  <!-- Jquery -->
  <script src="https://code.jquery.com/jquery-3.7.0.slim.min.js"
          integrity="sha256-tG5mcZUtJsZvyKAxYLVXrmjKBVLd6VpVccqz/r4ypFE="
          crossorigin="anonymous"></script>

  <!-- Slick -->
  <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
  <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
  <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'dom'); ?></a>

  <header id="masthead" class="site-header">
    <div class="site-branding">
      <?php
      the_custom_logo();
      if (is_front_page() && is_home()) :
        ?>
        <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
      <?php
      else :
        ?>
        <p class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></p>
      <?php
      endif;
      $dom_description = get_bloginfo('description', 'display');
      if ($dom_description || is_customize_preview()) :
        ?>
        <p class="site-description"><?php echo $dom_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
          ?></p>
      <?php endif; ?>
    </div><!-- .site-branding -->

    <nav id="site-navigation" class="main-navigation">
      <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e('Primary Menu', 'dom'); ?></button>
      <?php
      wp_nav_menu(
        array(
          'menu_id' => 'primary-menu',
        )
      );
      ?>
    </nav><!-- #site-navigation -->
  </header><!-- #masthead -->
