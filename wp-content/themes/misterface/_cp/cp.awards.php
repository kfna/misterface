<?php

# AWARDS

function cp_award() {
	$labels = array(
		'name'               => _x( 'Awards', 'post type general name' ),
		'singular_name'      => _x( 'Award', 'post type singular name' ),
		'add_new'            => _x( 'Add New', 'award' ),
		'add_new_item'       => __( 'Add New Award' ),
		'edit_item'          => __( 'Edit Award' ),
		'new_item'           => __( 'New Award' ),
		'all_items'          => __( 'All Awards' ),
		'view_item'          => __( 'View Award' ),
		'search_items'       => __( 'Search Awards' ),
		'not_found'          => __( 'No awards found' ),
		'not_found_in_trash' => __( 'No awards found in the Trash' ), 
		'parent_item_colon'  => '',
		'menu_name'          => 'Awards'
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
	register_post_type('award', $args );	
}


add_action( 'init', 'cp_award' );

?>