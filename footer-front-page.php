<?php
/**
 * @package WordPress
 * @subpackage handcrafted
 */
?>

	</div><!-- #main  -->

	<footer id="colophon" class="invisible" role="contentinfo">
			<div id="site-generator">
				<small>&copy Copyright <?php echo esc_attr( get_bloginfo( 'name', 'display' ) ) . " " . date('Y'); ?>
				<!-- <a href="http://wordpress.org/" title="<?php esc_attr_e( 'A Semantic Personal Publishing Platform', 'themename' ); ?>" rel="generator"><?php printf( __( 'Proudly powered by %s.', 'themename' ), 'WordPress' ); ?></a> -->
				</small>
			</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>