<?php

# CLIENTS

function cp_client() {
	$labels = array(
		'name'               => _x( 'Clients', 'post type general name' ),
		'singular_name'      => _x( 'Client', 'post type singular name' ),
		'add_new'            => _x( 'Add New', 'client' ),
		'add_new_item'       => __( 'Add New Client' ),
		'edit_item'          => __( 'Edit Client' ),
		'new_item'           => __( 'New Client' ),
		'all_items'          => __( 'All Clients' ),
		'view_item'          => __( 'View Client' ),
		'search_items'       => __( 'Search Clients' ),
		'not_found'          => __( 'No clients found' ),
		'not_found_in_trash' => __( 'No clients found in the Trash' ), 
		'parent_item_colon'  => '',
		'menu_name'          => 'Clients'
	);
	$args = array(
		'labels'        => $labels,
		'description'   => '',
		'public'        => true,
		'menu_position' => 5,
		'supports'      => array('title', 'thumbnail'),
		'has_archive'   => true,
		'register_meta_box_cb' => ''
	);
	register_post_type('client', $args );	
}


add_action( 'init', 'cp_client' );

?>