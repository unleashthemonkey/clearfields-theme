<?php

// function: post_type BEGIN
function post_type()
{
	// Create The Labels (Output) For The Post Type
	$labels = 
	array(
		// The plural form of the name of your post type.
		'name' => __( 'Profile'), 
		
		// The singular form of the name of your post type.
		'singular_name' => __('Profile'),
		
		// The rewrite of the post type
		'rewrite' => 
			array(
				// prepends our post type with this slug
				'slug' => __( 'profile' ) 
			),
			
		// The menu item for adding a new post.
		'add_new' => _x('Add Item', 'profile'), 
		
		// The header shown when editing a post.
		'edit_item' => __('Edit Profile Item'),
		
		// Shown in the favourites menu in the admin header.
		'new_item' => __('New Profile Item'), 
		
		// Shown alongside the permalink on the edit post screen.
		'view_item' => __('View Profile'),
		
		// Button text for the search box on the edit posts screen.
		'search_items' => __('Search Profile'), 
		
		// Text to display when no posts are found through search in the admin.
		'not_found' =>  __('No Profile Items Found'),
		
		// Text to display when no posts are in the trash.
		'not_found_in_trash' => __('No Profile Items Found In Trash'),
		 
		// Used as a label for a parent post on the edit posts screen. Only useful for hierarchical post types.
		'parent_item_colon' => '' 
	);
	
	// Set Up The Arguements
	$args = 
	array(
		// Pass The Array Of Labels
		'labels' => $labels, 
		
		// Display The Post Type To Admin
		'public' => true, 
		
		// Allow Post Type To Be Queried 
		'publicly_queryable' => true, 
		
		// Build a UI for the Post Type
		'show_ui' => true, 
		
		// Use String for Query Post Type
		'query_var' => true, 
		
		// Rewrite the slug
		'rewrite' => true, 
		
		// Set type to construct arguements
		'capability_type' => 'post', 
		
		// Disable Hierachical - No Parent
		'hierarchical' => false, 
		
		// Set Menu Position for where it displays in the navigation bar
		'menu_position' => null, 
		
		// Allow the profile to support a Title, Editor, Thumbnail
		'supports' => 
			array(
				'title',
				'editor',
				'thumbnail'
			) 
	);
	
	// Register The Post Type
	register_post_type(__( 'profile' ),$args);
	
	
} // function: post_type END


// function: profile_messages BEGIN
function profile_messages($messages)
{
	$messages[__( 'profile' )] = 
		array(
			// Unused. Messages start at index 1
			0 => '',
			
			// Change the message once updated
			1 => sprintf(__('Profile Updated. <a href="%s">View profile</a>'), esc_url(get_permalink($post_ID))),
			
			// Change the message if custom field has been updated
			2 => __('Custom Field Updated.'),
			
			// Change the message if custom field has been deleted
			3 => __('Custom Field Deleted.'),
			
			// Change the message once profile been updated
			4 => __('Profile Updated.'),
			
			// Change the message during revisions
			5 => isset($_GET['revision']) ? sprintf( __('Profile Restored To Revision From %s'), wp_post_revision_title((int)$_GET['revision'],false)) : false,
			
			// Change the message once published
			6 => sprintf(__('Profile Published. <a href="%s">View Profile</a>'), esc_url(get_permalink($post_ID))),
			
			// Change the message when saved
			7 => __('Profile Saved.'),
			
			// Change the message when submitted item
			8 => sprintf(__('Profile Submitted. <a target="_blank" href="%s">Preview Profile</a>'), esc_url( add_query_arg('preview','true',get_permalink($post_ID)))),
			
			// Change the message when a scheduled preview has been made
			9 => sprintf(__('Profile Scheduled For: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Profile</a>'),date_i18n( __( 'M j, Y @ G:i' ),strtotime($post->post_date)), esc_url(get_permalink($post_ID))),
			
			// Change the message when draft has been made
			10 => sprintf(__('Profile Draft Updated. <a target="_blank" href="%s">Preview Profile</a>'), esc_url( add_query_arg('preview','true',get_permalink($post_ID)))),
		);
	return $messages;	
	
} // function: profile_messages END

// function: profile_filter BEGIN
function profile_filter()
{
	// Register the Taxonomy
	register_taxonomy(__( "filter" ), 
	
	// Assign the taxonomy to be part of the profile post type
	array(__( "profile" )), 
	
	// Apply the settings for the taxonomy
	array(
		"hierarchical" => true, 
		"label" => __( "Filter" ), 
		"singular_label" => __( "Filter" ), 
		"rewrite" => array(
				'slug' => 'filter', 
				'hierarchical' => true
				)
		)
	); 
} // function: profile_filter END


add_action('init', 'post_type');
add_action( 'init', 'profile_filter', 0 );
add_filter('post_updated_messages', 'profile_messages');


function cpt_icons() {
    ?>
    <style type="text/css" media="screen">
        #menu-posts-profile .wp-menu-image {
            background: url(<?php bloginfo('template_url') ?>../images/users.png) no-repeat 6px -17px !important;
        }
		#menu-posts-profile:hover .wp-menu-image, #menu-posts-profile .wp-has-current-submenu .wp-menu-image {
            background-position:6px 7px!important;
        }
    </style>

<?php } ?>