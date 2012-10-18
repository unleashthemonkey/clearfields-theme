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

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article">
					<header class="entry-header">
						<h1 class="entry-title"><?php the_title(); ?></h1>

						<div class="entry-meta">
							<?php
								printf( __( '<span class="meta-prep meta-prep-author"> </span><a href="%1$s" rel="bookmark"><time class="entry-date" datetime="%2$s" pubdate>%3$s</time></a> <span class="meta-sep"> </span> <span class="author vcard"><a class="url fn n" href="%4$s" title="%5$s">%6$s</a></span>', 'themename' ),
									get_permalink(),
									get_the_date( 'c' ),
									get_the_date(),
									get_author_posts_url( get_the_author_meta( 'ID' ) ),
									sprintf( esc_attr__( 'View all posts by %s', 'themename' ), get_the_author() ),
									get_the_author()
								);
							?>
						</div><!-- .entry-meta -->
					</header><!-- .entry-header -->

					<div class="entry-content clearfix">
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'themename' ), 'after' => '</div>' ) ); ?>
					</div><!-- .entry-content -->

					<footer>
						<?php
								$utility_text = __( 'Bekijk alle berichten uit de categorie %1$s.', 'themename' );

							printf(
								$utility_text,
								get_the_category_list( ', ' )
							);
						?>

						<?php edit_post_link( __( 'Edit', 'themename' ), '<span class="edit-link">', '</span>' ); ?>
					</footer><!-- .entry-meta -->
				</article><!-- #post-<?php the_ID(); ?> -->

				<nav id="nav-below" role="article">
					<h1 class="section-heading"><?php _e( 'Meer nieuws', 'themename' ); ?></h1>
					<div class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'themename' ) . '</span>'._x('Vorig bericht:','Previous post text','themename'). ' "%title"',TRUE ); ?></div>
					<div class="nav-next"><?php next_post_link( '%link', _x('Volgend bericht:','Next post text','themename').' "%title" <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'themename' ) . '</span>',TRUE ); ?></div>
				</nav><!-- #nav-below -->

			<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>