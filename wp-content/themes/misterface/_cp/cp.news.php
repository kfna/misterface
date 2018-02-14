<?php

# NEWS

function cp_new() {
	$labels = array(
		'name'               => _x( 'News', 'post type general name' ),
		'singular_name'      => _x( 'New', 'post type singular name' ),
		'add_new'            => _x( 'Add New', 'new' ),
		'add_new_item'       => __( 'Add New New' ),
		'edit_item'          => __( 'Edit New' ),
		'new_item'           => __( 'New New' ),
		'all_items'          => __( 'All News' ),
		'view_item'          => __( 'View New' ),
		'search_items'       => __( 'Search News' ),
		'not_found'          => __( 'No News found' ),
		'not_found_in_trash' => __( 'No News found in the Trash' ), 
		'parent_item_colon'  => '',
		'menu_name'          => 'News'
	);
	$args = array(
		'labels'        => $labels,
		'description'   => '',
		'public'        => true,
		'menu_position' => 5,
		'supports'      => array('title', 'thumbnail'),
		'has_archive'   => true,
		'register_meta_box_cb' => 'cp_news_metabox'
	);
	register_post_type('news', $args );	
}


function cp_news_metabox(){  add_meta_box('cp_news_metabox', 'Details', 'cp_news_form_metabox', 'news');  }

function cp_news_form_metabox() {
    global $post;
	$date = get_post_meta($post->ID, 'date', true);
	$link = get_post_meta($post->ID, 'link', true);	
	$url = get_post_meta($post->ID, 'url', true);	
	
    echo '<label style="width:80px; float:left;"><strong>Date</strong></label>';
    echo '<input type="text" style="width:300px; float:left;" id="txt_date" name="txt_date" value="'.$date.'"/>';
    echo '<br style="clear:both;" /><br />';
		 
    echo '<label style="width:80px; float:left;"><strong>Description</strong></label>';
    echo '<input type="text" style="width:600px; float:left;" id="txt_link" name="txt_link" value="'.$link.'"/>';
	echo '<br style="clear:both;" />';
	
	echo '<label style="width:80px; float:left;"><strong>Link</strong></label>';
    echo '<input type="text" style="width:600px; float:left;" id="txt_url" name="txt_url" value="'.$url.'"/>';
	echo '<br style="clear:both;" />';
 }
 
 
 function cp_news_save_meta($post_id, $post) {
  if(!wp_verify_nonce($_POST, plugin_basename(__FILE__))){ $post->ID; }
  $news_meta['date'] = $_POST['txt_date'];
  $news_meta['link'] = $_POST['txt_link'];
  $news_meta['url'] = $_POST['txt_url'];
  foreach ($news_meta as $key => $value) { 
   if($post->post_type == 'news'){}
    $value = implode(',', (array)$value);
    if(get_post_meta($post->ID, $key, FALSE)) { update_post_meta($post->ID, $key, $value); } else { add_post_meta($post->ID, $key, $value); }
    //if(!$value) delete_post_meta($post->ID, $key); 
  }

}

add_action( 'init', 'cp_new' );
add_action('save_post', 'cp_news_save_meta', 1, 2); // save the custom fields

?>