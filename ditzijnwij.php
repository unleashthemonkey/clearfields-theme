<?php
/**
 * @package WordPress
 * @subpackage handcrafted
 */

/*
Template Name: ditzijnwij
*/
	wp_enqueue_script( 'page_animations', get_template_directory_uri() . '/js/page_animations.js', array( 'jquery' ), '2012-08-13' );
		wp_enqueue_script( 'functions_page', get_template_directory_uri() . '/js/functions_page.js', array( 'jquery' ), '2012-08-13' );
		wp_enqueue_script( 'overlay', 'http://cdn.jquerytools.org/1.2.7/all/jquery.tools.min.js', array( 'jquery' ), null);
		wp_enqueue_script( 'init_overlay', get_template_directory_uri() . '/js/init_overlay.js', array( 'overlay' ), null);
		wp_enqueue_script( 'functions_ditzijnwij', get_template_directory_uri() . '/js/functions_ditzijnwij.js', array( 'jquery' ), '2012-08-13' );

get_header(); ?>

		<div id="primary" class="ditzijnwij">
			<div id="content">

				<?php the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article">
					<header class="entry-header">
						<h1 class="entry-title"><?php the_title(); ?></h1>
						<?php $utm_subtitle = get_post_meta($post->ID, 'utm_subtitle_info', true); ?>
						<h2 class="subtitle"><?php echo $utm_subtitle; ?></h2>
						
					</header><!-- .entry-header -->

					<div class="entry-content">
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'themename' ), 'after' => '</div>' ) ); ?>
						<?php edit_post_link( __( 'Edit', 'themename' ), '<span class="edit-link">', '</span>' ); ?>

					</div><!-- .entry-content -->
				</article><!-- #post-<?php the_ID(); ?> -->
				<?php include(get_template_directory()."/inc/overlay.php") ?>

 				<?php /* comments_template( '', true ); */ ?>

			</div><!-- #content -->
		</div><!-- #primary -->

<?php  get_footer();  ?>