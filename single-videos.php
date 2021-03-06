<?php
/**
 * @package WordPress
 * @subpackage handcrafted
 */

	wp_enqueue_script( 'page_animations', get_template_directory_uri() . '/js/page_animations.js', array( 'jquery' ), '2012-08-13' );
		wp_enqueue_script( 'functions_page', get_template_directory_uri() . '/js/functions_page.js', array( 'jquery' ), '2012-08-13' );

get_header(); ?>

		<div id="primary">
			<div id="content">

			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

<!--
				<nav id="nav-above" role="article">
					<h1 class="section-heading"><?php _e( 'Bekijk ook de andere boeken', 'themename' ); ?></h1>
					<div class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'themename' ) . '</span> %title' ); ?></div>
					<div class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'themename' ) . '</span>' ); ?></div>
				</nav>--><!-- #nav-above -->


				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article">
					<header class="entry-header">
						<h1 class="entry-title"><?php the_title(); ?></h1>
						<h2 class="subtitle"><?php echo(types_render_field("book-author", array("raw"=>"true"))); ?></h2>
					</header><!-- .entry-header -->

					<div class="entry-content clearfix">
					<?php
					$video_type = types_render_field("video-site", array("raw"=>"true"));
					if ($video_type == 2): ?>
					
					<iframe src="http://player.vimeo.com/video/<?php echo(types_render_field("vimeo-id", array("raw"=>"true"))); ?>?title=1&amp;byline=1&amp;portrait=0&amp;badge=0" width="250" height="166" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
					<?php endif;
					if ($video_type == 3): ?>
					
					<iframe width="250" height="166" src="http://www.youtube.com/embed/<?php echo(types_render_field("youtube-id", array("raw"=>"true"))); ?>?rel=0" frameborder="0" allowfullscreen></iframe>

					<?php endif; ?>
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'themename' ), 'after' => '</div>' ) ); ?>
					</div><!-- .entry-content -->

					<footer>

						<?php edit_post_link( __( 'Edit', 'themename' ), '<span class="edit-link">', '</span>' ); ?>
					</footer><!-- .entry-meta -->
				</article><!-- #post-<?php the_ID(); ?> -->


				<nav id="nav-below" role="article">
					<h1 class="section-heading"><?php _e( 'Bekijk ook de andere boeken', 'themename' ); ?></h1>
					<div class="post">
					<?php include(get_template_directory()."/inc/videoshelf.php") ?>
					</div>
				</nav><!-- #nav-below -->

			<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>