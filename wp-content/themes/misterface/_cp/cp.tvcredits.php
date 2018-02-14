<?php

# TV CREDIT

function cp_tvcredit() {
	$labels = array(
		'name'               => _x( 'TV Credits', 'post type general name' ),
		'singular_name'      => _x( 'Credit', 'post type singular name' ),
		'add_new'            => _x( 'Add New', 'credit' ),
		'add_new_item'       => __( 'Add New TV Credit' ),
		'edit_item'          => __( 'Edit TV Credit' ),
		'new_item'           => __( 'New TV Credit' ),
		'all_items'          => __( 'All TV Credits' ),
		'view_item'          => __( 'View TV Credit' ),
		'search_items'       => __( 'Search TV Credits' ),
		'not_found'          => __( 'No TV Credits found' ),
		'not_found_in_trash' => __( 'No TV Credits found in the Trash' ), 
		'parent_item_colon'  => '',
		'menu_name'          => 'TV Credits'
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
	register_post_type('tvcredit', $args );	
}


add_action( 'init', 'cp_tvcredit' );

?>