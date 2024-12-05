<?php
add_action( 'init', 'event_init' );
/**
 * Register a Job post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
function event_init() {
	$labels = array(
		'name'               => _x( 'Event', 'post type general name', 'mjt' ),
		'singular_name'      => _x( 'Event', 'post type singular name', 'mjt' ),
		'menu_name'          => _x( 'Events', 'admin menu', 'mjt' ),
		'name_admin_bar'     => _x( 'Event', 'add new on admin bar', 'mjt' ),
		'add_new'            => _x( 'Add New', 'Event', 'mjt' ),
		'add_new_item'       => __( 'Add New Event', 'mjt' ),
		'new_item'           => __( 'New Event', 'mjt' ),
		'edit_item'          => __( 'Edit Event', 'mjt' ),
		'view_item'          => __( 'View Event', 'mjt' ),
		'all_items'          => __( 'All Events', 'mjt' ),
		'search_items'       => __( 'Search Events', 'mjt' ),
		'parent_item_colon'  => __( 'Parent Event', 'mjt' ),
		'not_found'          => __( 'No Event found.', 'mjt' ),
		'not_found_in_trash' => __( 'No Event found in Trash.', 'mjt' )
	);

	$args = array(
		'labels'             => $labels,
		'description'        => __( 'Description.', 'mjt' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'event' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 15,
		'menu_icon'			     => 'dashicons-calendar',
		'taxonomies'   		   => array(),
		'supports'           => array( 'title', 'thumbnail' )
	);
	register_post_type( 'event', $args );
}

?>