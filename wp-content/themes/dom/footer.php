<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package dom
 */

$footer_copyright = get_field( 'copyright', 'option' );

?>

	<footer id="colophon" class="site-footer">

    <?php

    // Check if WPML is active
    if (function_exists('icl_get_languages')) {
      // Display the language switcher
      do_action('wpml_add_language_selector');
    }
    ?>

		<div class="site-info">
			<p><?= $footer_copyright ?></p>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->


</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
