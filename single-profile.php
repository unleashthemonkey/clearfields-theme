<?php
/**
 * @package WordPress
 * @subpackage handcrafted
 */
	wp_enqueue_script( 'page_animations', get_template_directory_uri() . '/js/page_animations.js', array( 'jquery' ), '2012-08-13' );
		wp_enqueue_script( 'functions_page', get_template_directory_uri() . '/js/functions_page.js', array( 'jquery' ), '2012-08-13' );

get_header('profile'); ?>

		<div id="primary" class="profile">
			<div id="content">

				<?php the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article">
					<header class="entry-header">
						<a class="back-to-thumbs" href="http://www.clearfields.nl/backend/index.php/bureau/dit-zijn-wij/"><p>&lt; terug naar het overzicht</p></a>
						<h1 class="entry-title"><?php the_title(); ?></h1>
						<?php $utm_subtitle = get_post_meta($post->ID, 'utm_subtitle_info', true); ?>
						<h2 class="subtitle"><?php echo $utm_subtitle; ?></h2>
						
					</header><!-- .entry-header -->
					<div id="profile-wrapper">
					<div class="sinlge-profile-header" style="background-image:url(<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ); $thumburl = $thumb['0']; echo($thumburl); ?>);">	
				    <p><?php echo(types_render_field("profile-quote", array("raw"=>"true"))); ?></p>
				    <h6><?php the_title(); ?></h6>
				    <div class="social">
					    <p>
					    <a href="<?php echo(types_render_field("profile-twitter", array("raw"=>"true"))); ?>" target="_blank"><img src="<?php bloginfo('template_url') ?>/images/twit.png" width="18" height="18" alt="Twitter"/></a>
					    <a href="<?php echo(types_render_field("profile-linkedin", array("raw"=>"true"))); ?>" target="_blank"><img src="<?php bloginfo('template_url') ?>/images/linkedin.png" width="18" height="18" alt="LinkedIn"/></a>
					    <p>
				    </div>
				    </div>
					<div class="entry-content">
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'themename' ), 'after' => '</div>' ) ); ?>
						<?php edit_post_link( __( 'Edit', 'themename' ), '<span class="edit-link">', '</span>' ); ?>
					</div><!-- .entry-content -->
					</div>
				</article><!-- #post-<?php the_ID(); ?> -->

 				<?php /* comments_template( '', true ); */ ?>

			</div><!-- #content -->
		</div><!-- #primary -->

<?php /* get_sidebar(); */ ?>
<?php  get_footer();  ?>