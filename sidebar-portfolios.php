<?php
/**
 * @package WordPress
 * @subpackage handcrafted
 */
?>
		<div id="secondary" class="widget-area">
			<?php if ( ! dynamic_sidebar( 'portfolios' ) ) : ?>

				<aside id="archives" class="widget" role="complementary">
					<h2 class="widget-title"><?php _e( 'Archives', 'themename' ); ?></h2>
					<ul>
						<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
					</ul>
				</aside>

				<aside id="meta" class="widget" role="complementary">
					<h2 class="widget-title"><?php _e( 'Meta', 'themename' ); ?></h2>
					<ul>
						<?php wp_register(); ?>
						<aside role="complementary"><?php wp_loginout(); ?></aside>
						<?php wp_meta(); ?>
					</ul>
				</aside>

			<?php endif; // end sidebar widget area ?>
		</div><!-- #secondary .widget-area -->