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
    <div class="footer_inner w1328">
      <div class="site-info">
        <p class="fw-700 s14"><?= $footer_copyright ?></p>
      </div>
    </div>
	</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
