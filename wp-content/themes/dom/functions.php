<?php
/**
 * dom functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package dom
 */

if (!defined('_S_VERSION')) {
  // Replace the version number of the theme on each release.
  define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function dom_setup()
{
  /*
    * Make theme available for translation.
    * Translations can be filed in the /languages/ directory.
    * If you're building a theme based on dom, use a find and replace
    * to change 'dom' to the name of your theme in all the template files.
    */
  load_theme_textdomain('dom', get_template_directory() . '/languages');

  // Add default posts and comments RSS feed links to head.
  add_theme_support('automatic-feed-links');

  /*
    * Let WordPress manage the document title.
    * By adding theme support, we declare that this theme does not use a
    * hard-coded <title> tag in the document head, and expect WordPress to
    * provide it for us.
    */
  add_theme_support('title-tag');

  /*
    * Enable support for Post Thumbnails on posts and pages.
    *
    * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
    */
  add_theme_support('post-thumbnails');

  // This theme uses wp_nav_menu() in one location.
  register_nav_menus(
    array(
      'menu-1' => esc_html__('Primary', 'dom'),
    )
  );

  /*
    * Switch default core markup for search form, comment form, and comments
    * to output valid HTML5.
    */
  add_theme_support(
    'html5',
    array(
      'search-form',
      'comment-form',
      'comment-list',
      'gallery',
      'caption',
      'style',
      'script',
    )
  );

  // Set up the WordPress core custom background feature.
  add_theme_support(
    'custom-background',
    apply_filters(
      'dom_custom_background_args',
      array(
        'default-color' => 'ffffff',
        'default-image' => '',
      )
    )
  );

  // Add theme support for selective refresh for widgets.
  add_theme_support('customize-selective-refresh-widgets');

  /**
   * Add support for core custom logo.
   *
   * @link https://codex.wordpress.org/Theme_Logo
   */
  add_theme_support(
    'custom-logo',
    array(
      'height' => 250,
      'width' => 250,
      'flex-width' => true,
      'flex-height' => true,
    )
  );
}

add_action('after_setup_theme', 'dom_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function dom_content_width()
{
  $GLOBALS['content_width'] = apply_filters('dom_content_width', 640);
}

add_action('after_setup_theme', 'dom_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function dom_widgets_init()
{
  register_sidebar(
    array(
      'name' => esc_html__('Sidebar', 'dom'),
      'id' => 'sidebar-1',
      'description' => esc_html__('Add widgets here.', 'dom'),
      'before_widget' => '<section id="%1$s" class="widget %2$s">',
      'after_widget' => '</section>',
      'before_title' => '<h2 class="widget-title">',
      'after_title' => '</h2>',
    )
  );
}

add_action('widgets_init', 'dom_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function dom_scripts()
{
  // Styles
  wp_enqueue_style('dom-style', get_stylesheet_uri(), array(), _S_VERSION);
  //  wp_style_add_data('dom-style', 'rtl', 'replace');
  wp_enqueue_style('dom-slick-css', get_template_directory_uri() . '/js/slick.css', array(), _S_VERSION);

  // Scripts
  wp_enqueue_script('detect-browsers', get_template_directory_uri() . '/js/detect-browsers.js', array(), _S_VERSION, true);
  wp_enqueue_script('dom-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);

  wp_enqueue_script('dom-jquery', get_template_directory_uri() . '/js/jquery-1.12.4.min.js', array(), _S_VERSION, true);
  wp_enqueue_script('dom-slick-js', get_template_directory_uri() . '/js/slick.min.js', array(), _S_VERSION, true);
  wp_enqueue_script('dom-script', get_template_directory_uri() . '/js/script.js', array(), _S_VERSION, true);

  if (is_singular() && comments_open() && get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
  }
}

function enqueue_less_styles()
{
  wp_enqueue_style('main-less', get_template_directory_uri() . '/css/main-style.less');
}

add_action('wp_enqueue_scripts', 'dom_scripts');
add_action('wp_enqueue_scripts', 'enqueue_less_styles');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
  require get_template_directory() . '/inc/jetpack.php';
}

// START CUSTOM THEME

// Remove global-styles
remove_action('wp_enqueue_scripts', 'wp_enqueue_global_styles');
remove_action('wp_footer', 'wp_enqueue_global_styles', 1);
remove_action('wp_body_open', 'wp_global_styles_render_svg_filters');

// Disable the threshold.
add_filter('big_image_size_threshold', '__return_false');

// Remove default image sizes here.
function remove_extra_image_sizes()
{
  foreach (get_intermediate_image_sizes() as $size) {
    if (!in_array($size, array('thumbnail', 'medium', 'medium_large', 'large'))) {
      remove_image_size($size);
    }
  }
}

add_action('init', 'remove_extra_image_sizes');

add_image_size('large', 150, 0, true);
add_image_size('medium_large', 150, 0, true);
add_image_size('medium', 150, 0, true);
add_image_size('thumbnail', 150, 0, true);

add_theme_support('large');
add_theme_support('medium_large');
add_theme_support('medium');
add_theme_support('thumbnail');

update_option('medium_large_size_w', 150);
// END - Images

/* Disable WordPress Admin Bar for all users */
add_filter('show_admin_bar', '__return_false');


// Add Page Slug Body Class
function add_slug_body_class($classes)
{
  global $post;
  if (isset($post)) {
    $classes[] = $post->post_type . '-' . $post->post_name;
  }
  return $classes;
}

add_filter('body_class', 'add_slug_body_class');


// Add slug column for PAGE posts
add_filter("manage_page_posts_columns", "page_columns");
function page_columns($columns)
{
  $add_columns = array(
    'slug' => 'Slug',
  );
  $res = array_slice($columns, 0, 2, true) +
    $add_columns +
    array_slice($columns, 2, count($columns) - 1, true);

  return $res;
}

add_action("manage_page_posts_custom_column", "my_custom_page_columns");
function my_custom_page_columns($column)
{
  global $post;
  switch ($column) {
    case 'slug' :
      echo $post->post_name;
      break;
  }
}

add_filter("manage_post_posts_columns", "page_columns");
add_action("manage_post_posts_custom_column", "my_custom_page_columns");

// END - Add slug column for PAGE posts


/**
 * Add section in admin page
 * @position function.php
 */
if (function_exists('acf_add_options_page')) {
  acf_add_options_page(
    array(
      'page_title' => 'Options Page',
      'menu_title' => 'Options Page Settings',
      'menu_slug' => 'options-page-settings',
      'capability' => 'edit_posts',
      'redirect' => true
    )
  );
  acf_add_options_sub_page(
    array(
      'page_title' => 'General Settings',
      'menu_title' => 'General Settings',
      'parent_slug' => 'options-page-settings'
    )
  );
  acf_add_options_sub_page(
    array(
      'page_title' => 'Header Settings',
      'menu_title' => 'Header Settings',
      'parent_slug' => 'options-page-settings'
    )
  );
  acf_add_options_sub_page(
    array(
      'page_title' => 'Footer Settings',
      'menu_title' => 'Footer Settings',
      'parent_slug' => 'options-page-settings'
    )
  );
}

/**
 * @param $price
 * @param string $symbol
 *
 * @return string
 */
function price_format($price, string $symbol = 'VNĐ'): string
{
  return number_format(floatval($price)) . ' ' . $symbol;
}

/**
 * @param $post
 * @param string $symbol
 *
 * @return string
 */
function getFinalPrice($post, string $symbol = 'VNĐ'): string
{
  if (!$post) {
    return '';
  }
  $regular_price = get_field('regular_price', $post);
  $sale_price = get_field('sale_price', $post);
  $finalPrice = $sale_price && intval($sale_price) > 0 ? $sale_price : $regular_price;

  return price_format($finalPrice, $symbol);
}

/**
 * @param string $text
 * @param string $link
 * @param string $class
 * @param bool $showArrow
 * @return string
 */
function render_button(
  string $text = '',
  string $link = 'javascript:void(0)',
  string $class = '',
  bool $showArrow = false
): string
{
  $html = '';
  if ($text) {
    $html = '<div class="default_btn '. $class .'">';
    $html .= '<a href="' . $link . '">';
    $html .= '<span class="_btnSpan">' . $text . '</span>';

    if ($showArrow) {
      $html .= '<svg width="32" height="13" viewBox="0 0 32 13" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M25.6318 11.5263L31.0003 6.26315L25.6318 0.99999" stroke="#2F5A50" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M1 6.26315L29.2105 6.26316" stroke="#2F5A50" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>';
    }
    $html .= '</a></div>';
  }

  return $html;
}

/**
 * @return string
 */
function getPreLink(): string
{
  $current_language = wpml_get_current_language();
  return $current_language === 'vi' ? '/vi/' : '/';
}

// Remove prefix in archive title
add_action('get_the_archive_title_prefix', 'get_the_archive_title_prefix_action');
function get_the_archive_title_prefix_action($prefix): string
{
  return '';
}

/**
 * @return string
 */
function getNoImageSrc(): string
{
  return get_template_directory_uri() . '/images/placeholder.jpg';
}

/**
 * @param string $defaultImg
 *
 * @return string
 */
function getDefaultImg(string $defaultImg = 'default-hero.jpg'): string
{
  return get_template_directory_uri() . '/images/' . $defaultImg;
}

/**
 * @param false $post
 * @param false $hasDateLabel
 */
function get_thumbnail_with_date_label($post = false, bool $hasDateLabel = false)
{
  if (!$post) {
    return;
  }
  ?>

  <div class="post-thumbnail">
    <?php echo get_the_post_thumbnail($post); ?>
    <?php if ($hasDateLabel) {
      $publishedDate = '<span class="_date">' . get_the_date('d', $post) .
        '</span><span class="_month">TH ' . get_the_date('m', $post) . "</span>";
      ?>
      <div class="_publishedDate s16 fw700"><?= $publishedDate ?></div>
    <?php } ?>
  </div>
<?php }