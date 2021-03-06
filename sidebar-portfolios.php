<?php
/**
 * @package WordPress
 * @subpackage handcrafted
 */
 
?>
		<div id="secondary portfolios" class="widget-area">
			<?php $sidebar_id = the_slug() . '-sidebar' ; if ( ! dynamic_sidebar( $sidebar_id ) ) : ?>

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