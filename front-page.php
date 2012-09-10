
<?php
	wp_enqueue_script('myui','https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.22/jquery-ui.min.js', array('jquery'), '1.8.22');
	wp_enqueue_script( 'page_animations', get_template_directory_uri() . '/js/page_animations.js', array( 'jquery' ), '2012-08-13' );
	wp_enqueue_script( 'functions_home', get_template_directory_uri() . '/js/functions_home.js', array( 'jquery' ), '2012-08-13' );
	
	// Enqueue showcase script for the slider
?>

<?php get_header('front-page'); ?>


<?php get_footer('front-page'); ?>