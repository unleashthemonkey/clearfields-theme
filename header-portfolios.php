<?php
/**
 * @package WordPress
 * @subpackage handcrafted
 */
?><!DOCTYPE html>
<!--[if lt IE 7 ]> <html <?php language_attributes(); ?> class="ie6"> <![endif]-->
<!--[if IE 7 ]>    <html <?php language_attributes(); ?> class="ie7"> <![endif]-->
<!--[if IE 8 ]>    <html <?php language_attributes(); ?> class="ie8"> <![endif]-->
<!--[if IE 9 ]>    <html <?php language_attributes(); ?> class="ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->

<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta http-equiv="X-UA-Compatible" content="chrome=1">

<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'themename' ), max( $paged, $page ) );

	?></title>
	<meta name="description" content="">
	<meta name="author" content="">
	<!--  Mobile Viewport Fix -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    
	<!-- Place favicon.ico and apple-touch-icons in the images folder -->
	<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico">
	<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/images/apple-touch-icon.png"><!--60X60-->
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/images/apple-touch-icon-ipad.png"><!--72X72-->
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/images/apple-touch-icon-iphone4.png"><!--114X114-->
	<link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_template_directory_uri(); ?>/images/apple-touch-icon-ipad3.png">	<!--144X144-->	
	
	<link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); echo '?' . filemtime( get_stylesheet_directory() . '/style.css'); ?>" type="text/css" media="screen, projection" />
   <link href="<?php echo get_stylesheet_directory_uri() ?>/css/ditzijnwij.css" rel="stylesheet" type="text/css" />';

	<?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	
	<!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
	
	<?php wp_head(); ?>
	<link rel="stylesheet" href="<?php bloginfo('template_url') ?>/css/supersize-override.css" type="text/css" />
	</head>
	
	<body <?php body_class(); ?>>
	<div id="page" class="hfeed">
		<header id="branding" role="banner">
				<div id="header-wrapper" class="invisible">
					<hgroup>
					<div id="site-title"><span><a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
					<img alt="<?php /* bloginfo( 'name' ); */ ?>" src="<?php bloginfo('template_url') ?>/images/logo.png">
					</a></span></div>
					<!-- <h2 id="site-description"><?php bloginfo( 'description' ); ?></h2> -->
					</hgroup>
					
				<div class="utility">
					<?php include (TEMPLATEPATH . '/searchform.php'); ?>
					<nav id="utility" role="article">
						<?php wp_nav_menu( array( 'theme_location' => 'utility' ) ); ?>
					</nav><!-- #utility -->
					</div>
				</div>
	
				<div class="centerwrapper<?php if ( is_page_template('ditzijnwij.php')) {echo" ditzijnwij";} if ( is_page_template('portfolio.php')) {echo" portfolio";} ?>">
				<?php if ( !is_page_template('prikbord.php')) { ?>
				<nav id="access" class="invisible" role="article">
					<?php is_subpage(); ?> <!-- Adds menu title and byline -->
					<div class="skip-link visuallyhidden"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'themename' ); ?>"><?php _e( 'Skip to content', 'themename' ); ?></a></div>
					<?php
						wp_nav_menu( array( 'theme_location' => 'portfolio' ) );					}
					?>
				</nav><!-- #access -->
				</div>
		</header><!-- #branding -->
	
		<div id="contentwrapper" class="<?php if ( is_page_template('portfolio.php')) {echo" portfolio";}?>">
		<div id="main"  class="invisible clearfix
			<?php
				echo"bureau portfolios";
			?>
		">