<?php
/**
 * @package WordPress
 * @subpackage handcrafted
 */

/**
 * Make theme available for translation
 * Translations can be filed in the /languages/ directory
 */
load_theme_textdomain( 'themename', get_template_directory() . '/languages' );

$locale = get_locale();
$locale_file = get_template_directory() . "/languages/$locale.php";
if ( is_readable( $locale_file ) )
	require_once( $locale_file );

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 640;

/**
 * Add jQuery
 */
function add_jquery_script() {
    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js');
    wp_enqueue_script( 'jquery' );
}    
add_action('wp_enqueue_scripts', 'add_jquery_script');

wp_enqueue_script( 'easing', get_bloginfo('template_directory').'/js/jquery.easing.1.3.js', array( 'jquery' ));


/**
 * Remove code from the <head>
 */
//remove_action('wp_head', 'rsd_link'); // Might be necessary if you or other people on this site use remote editors.
//remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
//remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
//remove_action('wp_head', 'index_rel_link'); // Displays relations link for site index
//remove_action('wp_head', 'wlwmanifest_link'); // Might be necessary if you or other people on this site use Windows Live Writer.
//remove_action('wp_head', 'start_post_rel_link', 10, 0); // Start link
//remove_action('wp_head', 'parent_post_rel_link', 10, 0); // Prev link
//remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0); // Display relational links for the posts adjacent to the current post.
remove_filter( 'the_content', 'capital_P_dangit' ); // Get outta my Wordpress codez dangit!
remove_filter( 'the_title', 'capital_P_dangit' );
remove_filter( 'comment_text', 'capital_P_dangit' );
// Hide the version of WordPress you're running from source and RSS feed // Want to JUST remove it from the source? Try: remove_action('wp_head', 'wp_generator');
/*function hcwp_remove_version() {return '';}
add_filter('the_generator', 'hcwp_remove_version');*/
// This function removes the comment inline css
/*function twentyten_remove_recent_comments_style() {
	global $wp_widget_factory;
	remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );
}
add_action( 'widgets_init', 'twentyten_remove_recent_comments_style' );*/

/**
 * Remove meta boxes from Post and Page Screens
 */
function customize_meta_boxes() {
   /* These remove meta boxes from POSTS */
  //remove_post_type_support("post","excerpt"); //Remove Excerpt Support
  //remove_post_type_support("post","author"); //Remove Author Support
  //remove_post_type_support("post","revisions"); //Remove Revision Support
  //remove_post_type_support("post","comments"); //Remove Comments Support
  //remove_post_type_support("post","trackbacks"); //Remove trackbacks Support
  //remove_post_type_support("post","editor"); //Remove Editor Support
  //remove_post_type_support("post","custom-fields"); //Remove custom-fields Support
  //remove_post_type_support("post","title"); //Remove Title Support

  
  /* These remove meta boxes from PAGES */
  //remove_post_type_support("page","revisions"); //Remove Revision Support
  remove_post_type_support("page","comments"); //Remove Comments Support
  //remove_post_type_support("page","author"); //Remove Author Support
  remove_post_type_support("page","trackbacks"); //Remove trackbacks Support
  //remove_post_type_support("page","custom-fields"); //Remove custom-fields Support
  
}
add_action('admin_init','customize_meta_boxes');

/**
 * Remove meta boxes from Post and Page Screens
 */

add_post_type_support( 'page', 'excerpt' );

function custom_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );


/**
 * This theme uses wp_nav_menus() for the header menu, utility menu and footer menu.
 */
register_nav_menus( array(
	'frontpage' => __( 'Frontpage Menu', 'themename' ),
	'primary' => __( 'Primary Menu', 'themename' ),
	'footer' => __( 'Footer Menu', 'themename' ),
	'utility' => __( 'Utility Menu', 'themename' ),
	'bureau' => __( 'Bureau menu', 'themename' ),
	'portfolio' => __( 'Portfolio menu', 'themename' ),
	'contact' => __( 'Contact menu', 'themename' )
) );


/**
 * This function is a conditional used to check if the page is a parent or a child to display the correct info in the main navmenu
 */
function is_subpage() {
    global $post;                              // load details about this page

    if ( is_page() && $post->post_parent ) {   // test to see if the page has a parent
        

        $filter = array(
        	'page_id'=> $post->post_parent
        );
              
        $parent_pages =  new WP_query($filter);
        
        if ($parent_pages->have_posts()) {
	        while ($parent_pages->have_posts()) : $parent_pages->the_post();
	        $parent_page_title = get_the_title();
	        $permalink = get_permalink();
	    echo '<a href="'.$permalink.'"><h1 class="section-heading">'.$parent_page_title.'</h1>';
	        	the_excerpt();
	        	echo '</a>';
	        endwhile;
	        wp_reset_postdata();
	    } else {
	    	echo 'cant load parent data';
	    }
        
    } elseif ( is_single() ) {
    
    
    } else {                                   // there is no parent so ...
        $page_title = get_the_title($post->ID);
        $page_excerpt = get_the_excerpt($post->ID);
        $permalink = get_permalink();
		echo '<a href="'.$permalink.'"><h1 class="section-heading">'.$page_title.'</h1>';	//display parent page title
		echo '<p>'.$page_excerpt.'</p></a>'; //display parent page excerpt
		}
}

/**
 * This is a custom walker to enable descriptions for the front page menu.
 */
class fpmenu_walker extends Walker_Nav_Menu
{
      function start_el(&$output, $item, $depth, $args)
      {
           global $wp_query;
           $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

           $class_names = $value = '';

           $classes = empty( $item->classes ) ? array() : (array) $item->classes;

           $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
           $class_names = ' class="'. esc_attr( $class_names ) . ' visuallyhidden"';

           $output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';

           $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
           $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
           $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
           $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

           $prepend = '<h1>';
           $append = '</h1>';
           $description  = ! empty( $item->description ) ? '<h2>'.esc_attr( $item->description ).'</h2>' : '';

           if($depth != 0)
           {
                     $description = $append = $prepend = "";
           }

            $item_output = $args->before;
            $item_output .= '<a'. $attributes .'>';
            $item_output .= $args->link_before .$prepend.apply_filters( 'the_title', $item->title, $item->ID ).$append;
            $item_output .= $description.$args->link_after;
            $item_output .= '</a>';
            $item_output .= $args->after;

            $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
            }
}

/** 
 * Add default posts and comments RSS feed links to head
 */
add_theme_support( 'automatic-feed-links' );

/**
 * This theme uses post thumbnails
 */
add_theme_support( 'post-thumbnails' );

/**
 *	This theme supports editor styles
 */

add_editor_style("/css/layout-style.css");

/**
 * Remove superfluous elements from the admin bar (uncomment as necessary)
 */
function remove_admin_bar_links() {
	global $wp_admin_bar;

	//$wp_admin_bar->remove_menu('wp-logo');
	//$wp_admin_bar->remove_menu('updates');	
	//$wp_admin_bar->remove_menu('my-account');
	//$wp_admin_bar->remove_menu('site-name');
	//$wp_admin_bar->remove_menu('my-sites');
	//$wp_admin_bar->remove_menu('get-shortlink');
	//$wp_admin_bar->remove_menu('edit');
	//$wp_admin_bar->remove_menu('new-content');
	//$wp_admin_bar->remove_menu('comments');
	//$wp_admin_bar->remove_menu('search');
}
//add_action('wp_before_admin_bar_render', 'remove_admin_bar_links');

/**
 *	Replace the default welcome 'Howdy' in the admin bar with something more professional.
 */
function admin_bar_replace_howdy($wp_admin_bar) {
    $account = $wp_admin_bar->get_node('my-account');
    $replace = str_replace('Howdy,', 'Welcome,', $account->title);            
    $wp_admin_bar->add_node(array('id' => 'my-account', 'title' => $replace));
}
add_filter('admin_bar_menu', 'admin_bar_replace_howdy', 25);

/**
 * This enables post formats. If you use this, make sure to delete any that you aren't going to use.
 */
add_theme_support( 'post-formats', array( 'video', 'gallery', 'link') );

/**
 * Register widgetized area and update sidebar with default widgets
 */
function handcraftedwp_widgets_init() {
	register_sidebar( array (
		'name' => __( 'Sidebar', 'themename' ),
		'id' => 'sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s" role="complementary">',
		'after_widget' => "</aside>",
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
	register_sidebar( array (
		'name' => __( 'Portfolios', 'themename' ),
		'id' => 'portfolios',
		'before_widget' => '<aside id="%1$s" class="widget %2$s" role="complementary">',
		'after_widget' => "</aside>",
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
}
add_action( 'init', 'handcraftedwp_widgets_init' );

/*
 * Remove senseless dashboard widgets for non-admins. (Un)Comment or delete as you wish.
 */
function remove_dashboard_widgets() {
	global $wp_meta_boxes;

	//unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']); // Plugins widget
	//unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']); // WordPress Blog widget
	//unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']); // Other WordPress News widget
	//unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']); // Right Now widget
	//unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']); // Quick Press widget
	//unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']); // Incoming Links widget
	//unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']); // Recent Drafts widget
	//unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']); // Recent Comments widget
}

/**
 *	Hide Menu Items in Admin
 */
function themename_configure_dashboard_menu() {
	global $menu,$submenu;

	global $current_user;
	get_currentuserinfo();

		// $menu and $submenu will return all menu and submenu list in admin panel
		
		// $menu[2] = ""; // Dashboard
		// $menu[5] = ""; // Posts
		// $menu[15] = ""; // Links
		// $menu[25] = ""; // Comments
		// $menu[65] = ""; // Plugins

		// unset($submenu['themes.php'][5]); // Themes
		// unset($submenu['themes.php'][12]); // Editor
}


// For non-admins, add action to Hide Dashboard Widgets and Admin Menu Items you just set above
// Don't forget to comment out the admin check to see that changes :)
if (!current_user_can('manage_options')) {
	add_action('wp_dashboard_setup', 'remove_dashboard_widgets'); // Add action to hide dashboard widgets
	add_action('admin_head', 'themename_configure_dashboard_menu'); // Add action to hide admin menu items
}
//define which icon to use for twitter
function twitpic(){
	if ( is_front_page() ) {
		echo "twit.png";
	} else {
		echo "twit-black.png";
	}
}

/* Fire our meta box setup function on the post editor screen. */
add_action( 'load-post.php', 'utm_meta_boxes_setup' );
add_action( 'load-post-new.php', 'utm_meta_boxes_setup' );

/* Meta box setup function. */
function utm_meta_boxes_setup() {

	/* Add meta boxes on the 'add_meta_boxes' hook. */
	add_action( 'add_meta_boxes', 'utm_add_post_meta_boxes' );

	/* Save post meta on the 'save_post' hook. */
	add_action( 'save_post', 'utm_save_post_subtitle_info', 10, 2 );
}

/* Create one or more meta boxes to be displayed on the post editor screen. */
function utm_add_post_meta_boxes() {

	add_meta_box(
		'utm-subtitle-info',			// Unique ID
		esc_html__( 'Subtitle', 'utm-by-clearfields' ),		// Title
		'utm_subtitle_info_meta_box',		// Callback function
		'page',					// Admin page (or post type)
		'normal',					// Context
		'high'					// Priority
	);
}

/* Display the post meta box. */
function utm_subtitle_info_meta_box( $object, $box ) { ?>

	<?php wp_nonce_field( basename( __FILE__ ), 'utm_subtitle_info_nonce' ); ?>

	<p>
		<label for="utm-subtitle-info"><?php _e( "Add a subtitle to the post.", 'utm-by-clearfields' ); ?></label>
		<br />
		<input class="widefat" type="text" name="utm-subtitle-info" id="utm-subtitle-info" value="<?php echo esc_attr( get_post_meta( $object->ID, 'utm_subtitle_info', true ) ); ?>" size="30" />
	</p>
<?php }

/* Save the meta box's post metadata. */
function utm_save_post_subtitle_info( $post_id, $post ) {

	/* Verify the nonce before proceeding. */
	if ( !isset( $_POST['utm_subtitle_info_nonce'] ) || !wp_verify_nonce( $_POST['utm_subtitle_info_nonce'], basename( __FILE__ ) ) )
		return $post_id;

	/* Get the post type object. */
	$post_type = get_post_type_object( $post->post_type );

	/* Check if the current user has permission to edit the post. */
	if ( !current_user_can( $post_type->cap->edit_post, $post_id ) )
		return $post_id;

	/* Get the posted data and sanitize it for use as an HTML class. */
	$new_meta_value = ( isset( $_POST['utm-subtitle-info'] ) ? sanitize_text_field( $_POST['utm-subtitle-info'] ) : '' );

	/* Get the meta key. */
	$meta_key = 'utm_subtitle_info';

	/* Get the meta value of the custom field key. */
	$meta_value = get_post_meta( $post_id, $meta_key, true );

	/* If a new meta value was added and there was no previous value, add it. */
	if ( $new_meta_value && '' == $meta_value )
		add_post_meta( $post_id, $meta_key, $new_meta_value, true );

	/* If the new meta value does not match the old value, update it. */
	elseif ( $new_meta_value && $new_meta_value != $meta_value )
		update_post_meta( $post_id, $meta_key, $new_meta_value );

	/* If there is no new meta value but an old value exists, delete it. */
	elseif ( '' == $new_meta_value && $meta_value )
		delete_post_meta( $post_id, $meta_key, $meta_value );
}

/* Fire our meta box setup function on the post editor screen. */
add_action( 'load-post.php', 'portfolios_meta_boxes_setup' );
add_action( 'load-post-new.php', 'portfolios_meta_boxes_setup' );

/* Meta box setup function. */
function portfolios_meta_boxes_setup() {

	/* Add meta boxes on the 'add_meta_boxes' hook. */
	add_action( 'add_meta_boxes', 'portfolios_add_post_meta_boxes' );

	/* Save post meta on the 'save_post' hook. */
	add_action( 'save_post', 'portfolios_save_post_participants_info', 10, 2 );
}

/* Create one or more meta boxes to be displayed on the post editor screen. */
function portfolios_add_post_meta_boxes() {

	add_meta_box(
		'portfolios-participants-info',			// Unique ID
		esc_html__( 'Participants', 'utm-by-clearfields' ),		// Title
		'portfolios_participants_info_meta_box',		// Callback function
		'portfolios',					// Admin page (or post type)
		'normal',					// Context
		'high'					// Priority
	);
}

/* Display the post meta box. */
function portfolios_participants_info_meta_box( $object, $box ) { ?>

	<?php wp_nonce_field( basename( __FILE__ ), 'portfolios_participants_info_nonce' ); ?>

	<p>
		<label for="portfolios-participants-info"><?php _e( "Select the colleagues who worked on the project.", 'utm-by-clearfields' ); ?></label>
		<br />
		<input class="widefat" type="text" name="portfolios-participants-info" id="portfolios-participants-info" value="<?php echo esc_attr( get_post_meta( $object->ID, 'portfolios_participants_info', true ) ); ?>" size="30" />
	</p>
<?php }

/* Save the meta box's post metadata. */
function portfolios_save_post_participants_info( $post_id, $post ) {

	/* Verify the nonce before proceeding. */
	if ( !isset( $_POST['portfolios_participants_info_nonce'] ) || !wp_verify_nonce( $_POST['portfolios_participants_info_nonce'], basename( __FILE__ ) ) )
		return $post_id;

	/* Get the post type object. */
	$post_type = get_post_type_object( $post->post_type );

	/* Check if the current user has permission to edit the post. */
	if ( !current_user_can( $post_type->cap->edit_post, $post_id ) )
		return $post_id;

	/* Get the posted data and sanitize it for use as an HTML class. */
	$new_meta_value = ( isset( $_POST['portfolios-participants-info'] ) ? sanitize_text_field( $_POST['portfolios-participants-info'] ) : '' );

	/* Get the meta key. */
	$meta_key = 'portfolios_participants_info';

	/* Get the meta value of the custom field key. */
	$meta_value = get_post_meta( $post_id, $meta_key, true );

	/* If a new meta value was added and there was no previous value, add it. */
	if ( $new_meta_value && '' == $meta_value )
		add_post_meta( $post_id, $meta_key, $new_meta_value, true );

	/* If the new meta value does not match the old value, update it. */
	elseif ( $new_meta_value && $new_meta_value != $meta_value )
		update_post_meta( $post_id, $meta_key, $new_meta_value );

	/* If there is no new meta value but an old value exists, delete it. */
	elseif ( '' == $new_meta_value && $meta_value )
		delete_post_meta( $post_id, $meta_key, $meta_value );
}


function my_connection_types() {
	p2p_register_connection_type( array(
		'name' => 'portfolios_to_profile',
		'from' => 'portfolios',
		'to' => 'profile'
	) );
	p2p_register_connection_type( array(
		'name' => 'profile_to_page',
		'from' => 'profile',
		'to' => 'page'
	) );
}
add_action( 'p2p_init', 'my_connection_types' );


?>
<?php // asynchronous google analytics: mathiasbynens.be/notes/async-analytics-snippet
//	 change the UA-XXXXX-X to be your site's ID
/*add_action('wp_footer', 'async_google_analytics');
function async_google_analytics() { ?>
	<script>
	var _gaq = [['_setAccount', 'UA-XXXXX-X'], ['_trackPageview']];
		(function(d, t) {
			var g = d.createElement(t),
				s = d.getElementsByTagName(t)[0];
			g.async = true;
			g.src = ('https:' == location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			s.parentNode.insertBefore(g, s);
		})(document, 'script');
	</script>
<?php }*/ ?>
<?php /*
 * A default custom post type. DELETE from here to the end if you don't want any custom post types
 */
/*add_action('init', 'create_boilertemplate_cpt');
function create_boilertemplate_cpt() 
{
  $labels = array(
    'name' => _x('HandcraftedWPTemplate CPT', 'post type general name'),
    'singular_name' => _x('HandcraftedWPTemplate CPT Item', 'post type singular name'),
    'add_new' => _x('Add New', 'handcraftedwptemplate_robot'),
    'add_new_item' => __('Add New Item'),
    'edit_item' => __('Edit Item'),
    'new_item' => __('New Item'),
    'view_item' => __('View Item'),
    'search_items' => __('Search Items'),
    'not_found' =>  __('No items found'),
    'not_found_in_trash' => __('No items found in Trash'), 
    'parent_item_colon' => ''
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'show_ui' => true, 
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'page',
    'hierarchical' => false,
    'menu_position' => 20,
    'supports' => array('title','editor')
  ); 
  register_post_type('handcraftedwptemplate_robot',$args);
}*/
/*
 * This is for a custom icon with a colored hover state for your custom post types. You can download the custom icons here 
 http://randyjensenonline.com/thoughts/wordpress-custom-post-type-fugue-icons/
 */
/*add_action( 'admin_head', 'cpt_icons' );
function cpt_icons() {
    ?>
    <style type="text/css" media="screen">
        #menu-posts-handcraftedwptemplaterobot .wp-menu-image {
            background: url(<?php bloginfo('template_url') ?>/images/robot.png) no-repeat 6px -17px !important;
        }
		#menu-posts-handcraftedwptemplaterobot:hover .wp-menu-image, #menu-posts-handcraftedwptemplaterobot.wp-has-current-submenu .wp-menu-image {
            background-position:6px 7px!important;
        }
    </style>
<?php }*/ ?>