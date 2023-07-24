<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package dom
 */

get_header();
?>

  <div id="main" class="site-main page-main index-template" role="main">

    <?php
    // Start the loop.
    while (have_posts()) : the_post();

      $page_sections = get_field('page_sections');

      if ($page_sections && is_array($page_sections)) {
        foreach ($page_sections as $section) {
          $layout = $section['acf_fc_layout'];

          get_template_part('acf-layout/section', $layout, $section);
          ?>
        <?php } ?>

      <?php } ?>

    <?php
    endwhile;
    // End of the loop.
    ?>

  </div><!-- .site-main -->

<?php /*
	<main id="primary" class="site-main">
		<?php
		if ( have_posts() ) :
			if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
				<?php
			endif;
			while ( have_posts() ) :
				the_post();
				get_template_part( 'template-parts/content', get_post_type() );
			endwhile;
			the_posts_navigation();
		else :
			get_template_part( 'template-parts/content', 'none' );
		endif;
		?>
	</main>
    */ ?>

<?php
//get_sidebar();
get_footer();
