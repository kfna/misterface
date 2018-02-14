<?php

#PEOPLE
function cp_people() {
	$labels = array(
		'name'               => _x( 'People', 'post type general name' ),
		'singular_name'      => _x( 'Person', 'post type singular name' ),
		'add_new'            => _x( 'Add New', 'person' ),
		'add_new_item'       => __( 'Add New Person' ),
		'edit_item'          => __( 'Edit Person' ),
		'new_item'           => __( 'New Person' ),
		'all_items'          => __( 'All People' ),
		'view_item'          => __( 'View Person' ),
		'search_items'       => __( 'Search People' ),
		'not_found'          => __( 'No people found' ),
		'not_found_in_trash' => __( 'No people found in the Trash' ), 
		'parent_item_colon'  => '',
		'menu_name'          => 'People'
	);
	$args = array(
		'labels'        => $labels,
		'description'   => '',
		'public'        => true,
		'menu_position' => 5,
		'supports'      => array('title', 'editor', 'thumbnail'),
		'has_archive'   => true,
		'register_meta_box_cb' => 'cp_people_metabox'
	);
	register_post_type('people', $args );	
}


function cp_people_metabox(){  add_meta_box('cp_people_metabox', 'Details', 'cp_people_form_metabox', 'people');  }

function cp_people_form_metabox() {
    global $post;
	$position = get_post_meta($post->ID, 'position', true);
	$email = get_post_meta($post->ID, 'email', true);	
	$alias = get_post_meta($post->ID, 'alias', true);
	$extra = get_post_meta($post->ID, 'extra', true);
	
	echo '<label style="width:80px; float:left;"><strong>Alias</strong></label>';
    echo '<input type="text" style="width:300px; float:left;" id="txt_alias" name="txt_alias" value="'.$alias.'"/>';
    echo '<br style="clear:both;" /><br />';
	
	echo '<label style="width:80px; float:left;"><strong>Extra Line</strong></label>';
    echo '<input type="text" style="width:300px; float:left;" id="txt_alias" name="txt_extra" value="'.$extra.'"/>';
    echo '<br style="clear:both;" /><br />';
	
    echo '<label style="width:80px; float:left;"><strong>Position</strong></label>';
    echo '<input type="text" style="width:300px; float:left;" id="txt_position" name="txt_position" value="'.$position.'"/>';
    echo '<br style="clear:both;" /><br />';
		 
    echo '<label style="width:80px; float:left;"><strong>E-Mail</strong></label>';
    echo '<input type="text" style="width:300px; float:left;" id="txt_email" name="txt_email" value="'.$email.'"/>';
	echo '<br style="clear:both;" />';
 }
 
 
 function cp_people_save_meta($post_id, $post) {
  if(!wp_verify_nonce($_POST, plugin_basename(__FILE__))){ $post->ID; }
  $people_meta['position'] = $_POST['txt_position'];
  $people_meta['email'] = $_POST['txt_email'];
  $people_meta['alias'] = $_POST['txt_alias'];
  $people_meta['extra'] = $_POST['txt_extra'];
  foreach ($people_meta as $key => $value) { 
   if($post->post_type == 'people'){}
    $value = implode(',', (array)$value);
    if(get_post_meta($post->ID, $key, FALSE)) { update_post_meta($post->ID, $key, $value); } else { add_post_meta($post->ID, $key, $value); }
    //if(!$value) delete_post_meta($post->ID, $key); 
  }

}

add_action( 'init', 'cp_people' );
add_action('save_post', 'cp_people_save_meta', 1, 2); // save the custom fields

?>