<?php
/**
 * @package WordPress
 * @subpackage handcrafted
 */

	wp_enqueue_script( 'page_animations', get_template_directory_uri() . '/js/page_animations.js', array( 'jquery' ), '2012-08-13' );
		wp_enqueue_script( 'functions_page', get_template_directory_uri() . '/js/functions_page.js', array( 'jquery' ), '2012-08-13' );
		wp_enqueue_script( 'overlay', 'http://cdn.jquerytools.org/1.2.7/all/jquery.tools.min.js', array( 'jquery' ), null);
		wp_enqueue_script( 'init_overlay', get_template_directory_uri() . '/js/init_overlay.js', array( 'overlay' ), null);
		wp_enqueue_script( 'functions_ditzijnwij', get_template_directory_uri() . '/js/functions_ditzijnwij.js', array( 'jquery' ), '2012-08-13' );

get_header('portfolios'); ?>

		<div id="primary">
			<div id="content">

			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

				<nav id="nav-above" role="article">
					<h1 class="section-heading"><?php _e( 'Post navigation', 'themename' ); ?></h1>
					<div class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'themename' ) . '</span> %title' ); ?></div>
					<div class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'themename' ) . '</span>' ); ?></div>
				</nav><!-- #nav-above -->

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article">
					<header class="entry-header">
						<h1 class="entry-title"><?php the_title(); ?></h1>

					</header><!-- .entry-header -->

					<div class="entry-content clearfix">
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'themename' ), 'after' => '</div>' ) ); ?>
					</div><!-- .entry-content -->
					
					<?php
					// Find connected pages
					$connected = new WP_Query( array(
					  'connected_type' => 'portfolios_to_profile',
					  'connected_items' => get_queried_object(),
					  'nopaging' => true,
					) );
					
					// Display connected pages
					if ( $connected->have_posts() ) :
					?>
					<h3>Related pages:</h3>
					<div class="thumb-gallery clearfix">
					<?php while ( $connected->have_posts() ) : $connected->the_post(); ?>
				        <div id="thumb-<?php echo($slideCount); ?>" class="profile-item" rel="#profile-<?php echo($slideCount); $slideCount++;?>">
				        <img
				        	src="<?php echo(types_render_field("profile-thumb-cf", array("raw"=>"true"))); ?>"
				        	alt="<?php the_title(); ?>"
				        />
				        <h5><?php the_title(); ?></h5>
				        <h6><?php echo(types_render_field("job-title", array("raw"=>"true"))); ?></h6>
				        </div>
					<?php endwhile; ?>
					</div>
					
					<?php 
					// Prevent weirdness
					wp_reset_postdata();
					
					endif;
					?>

					<footer>


						<?php edit_post_link( __( 'Edit', 'themename' ), '<span class="edit-link">', '</span>' ); ?>
					</footer><!-- .entry-meta -->
				</article><!-- #post-<?php the_ID(); ?> -->

				<nav id="nav-below" role="article">
					<h1 class="section-heading"><?php _e( 'Post navigation', 'themename' ); ?></h1>
					<div class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'themename' ) . '</span> %title' ); ?></div>
					<div class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'themename' ) . '</span>' ); ?></div>
				</nav><!-- #nav-below -->

			<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->
		</div><!-- #primary -->

<?php /* get_sidebar(); */ ?>
<?php get_footer(); ?>