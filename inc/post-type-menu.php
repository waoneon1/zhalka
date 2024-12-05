<?php
add_action( 'init', 'menu_init' );
/**
 * Register a Job post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
function menu_init() {
	$labels = array(
		'name'               => _x( 'Menu', 'post type general name', 'mjt' ),
		'singular_name'      => _x( 'Menu', 'post type singular name', 'mjt' ),
		'menu_name'          => _x( 'Menus', 'admin menu', 'mjt' ),
		'name_admin_bar'     => _x( 'Menu', 'add new on admin bar', 'mjt' ),
		'add_new'            => _x( 'Add New', 'Menu', 'mjt' ),
		'add_new_item'       => __( 'Add New Menu', 'mjt' ),
		'new_item'           => __( 'New Menu', 'mjt' ),
		'edit_item'          => __( 'Edit Menu', 'mjt' ),
		'view_item'          => __( 'View Menu', 'mjt' ),
		'all_items'          => __( 'All Menus', 'mjt' ),
		'search_items'       => __( 'Search Menus', 'mjt' ),
		'parent_item_colon'  => __( 'Parent Menu', 'mjt' ),
		'not_found'          => __( 'No Menu found.', 'mjt' ),
		'not_found_in_trash' => __( 'No Menu found in Trash.', 'mjt' )
	);

	$args = array(
		'labels'             => $labels,
		'description'        => __( 'Description.', 'mjt' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'menu' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 10,
		'menu_icon'			     => 'dashicons-food',
		'taxonomies'   		   => array('category'),
		'supports'           => array( 'title', 'thumbnail' )
	);
	register_post_type( 'menu', $args );
}

?>