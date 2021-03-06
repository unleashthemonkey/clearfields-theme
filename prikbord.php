<?php
/**
 * @package WordPress
 * @subpackage handcrafted
 */

/*
Template Name: prikbord
*/
	wp_enqueue_script( 'page_animations', get_template_directory_uri() . '/js/page_animations.js', array( 'jquery' ), '2012-08-13' );
		wp_enqueue_script( 'functions_page', get_template_directory_uri() . '/js/functions_page.js', array( 'jquery' ), '2012-08-13' );

get_header(); ?>
		<div id="primary" class="prikbord">
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
						<div class="post">
							<?php include(get_template_directory()."/inc/latestnews.php") ?>
						</div>
						<div class="post">
							<?php include(get_template_directory()."/inc/bookshelf.php") ?>
						</div>
						<div class="post">
							<?php include(get_template_directory()."/inc/latestvideos.php") ?>
						</div>
						<?php edit_post_link( __( 'Edit', 'themename' ), '<span class="edit-link">', '</span>' ); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-<?php the_ID(); ?> -->

 				<?php /* comments_template( '', true ); */ ?>

			</div><!-- #content -->
		</div><!-- #primary -->

<?php  get_sidebar();  ?>
<?php  get_footer();  ?>