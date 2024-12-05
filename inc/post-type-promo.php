<?php
add_action( 'init', 'promo_init' );
/**
 * Register a Job post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
function promo_init() {
	$labels = array(
		'name'               => _x( 'Promo', 'post type general name', 'mjt' ),
		'singular_name'      => _x( 'Promo', 'post type singular name', 'mjt' ),
		'menu_name'          => _x( 'Promos', 'admin menu', 'mjt' ),
		'name_admin_bar'     => _x( 'Promo', 'add new on admin bar', 'mjt' ),
		'add_new'            => _x( 'Add New', 'Promo', 'mjt' ),
		'add_new_item'       => __( 'Add New Promo', 'mjt' ),
		'new_item'           => __( 'New Promo', 'mjt' ),
		'edit_item'          => __( 'Edit Promo', 'mjt' ),
		'view_item'          => __( 'View Promo', 'mjt' ),
		'all_items'          => __( 'All Promos', 'mjt' ),
		'search_items'       => __( 'Search Promos', 'mjt' ),
		'parent_item_colon'  => __( 'Parent Promo', 'mjt' ),
		'not_found'          => __( 'No Promo found.', 'mjt' ),
		'not_found_in_trash' => __( 'No Promo found in Trash.', 'mjt' )
	);

	$args = array(
		'labels'             => $labels,
		'description'        => __( 'Description.', 'mjt' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'promo' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 15,
		'menu_icon'			     => 'dashicons-megaphone',
		'taxonomies'   		   => array(),
		'supports'           => array( 'title', 'thumbnail' )
	);
	register_post_type( 'promo', $args );
}

?>