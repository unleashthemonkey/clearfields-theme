<?php
/**
 * @package WordPress
 * @subpackage handcrafted
 */
?>

	</div><!-- #main  -->

	<footer id="colophon" class="invisible" role="contentinfo">
			<div id="site-generator">
				<?php wp_nav_menu( array( 'theme_location' => 'footer' ) ); ?>
			</div>
			<small>&copy Copyright <?php echo date('Y') . " " . esc_attr( get_bloginfo( 'name', 'display' ) ); ?></small>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>