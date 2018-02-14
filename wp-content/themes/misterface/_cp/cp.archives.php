<?php

# WORK
function cp_archive() {
	$labels = array(
		'name'               => _x( 'Archive', 'post type general name' ),
		'singular_name'      => _x( 'Archive', 'post type singular name' ),
		'add_new'            => _x( 'Add New', 'archive' ),
		'add_new_item'       => __( 'Add New Archive' ),
		'edit_item'          => __( 'Edit Archive' ),
		'new_item'           => __( 'New Archive' ),
		'all_items'          => __( 'All Archive' ),
		'view_item'          => __( 'View Archive' ),
		'search_items'       => __( 'Search Archive' ),
		'not_found'          => __( 'No Archive found' ),
		'not_found_in_trash' => __( 'No Archive found in the Trash' ), 
		'parent_item_colon'  => '',
		'menu_name'          => 'Archives'
	);
	$args = array(
		'labels'        => $labels,
		'description'   => '',
		'public'        => true,
		'menu_position' => 5,
		'supports'      => array('title', 'editor', 'thumbnail'),
		'has_archive'   => true,
		'register_meta_box_cb' => 'cp_archive_metabox'
	);
	register_post_type('archive', $args );	
}

function cp_archive_metabox(){  add_meta_box('cp_archive_metabox', 'Archives', 'cp_archive_form_metabox', 'archive');  }

function cp_archive_form_metabox() {
    global $post;
	$archive_0 = get_post_meta($post->ID, 'archive_0', true);
	$archive_1 = get_post_meta($post->ID, 'archive_1', true);
	$archive_2 = get_post_meta($post->ID, 'archive_2', true);
	$archive_3 = get_post_meta($post->ID, 'archive_3', true);
	$archive_4 = get_post_meta($post->ID, 'archive_4', true);
	$archive_5 = get_post_meta($post->ID, 'archive_5', true);
	$archive_6 = get_post_meta($post->ID, 'archive_6', true);
	$archive_7 = get_post_meta($post->ID, 'archive_7', true);
	$archive_8 = get_post_meta($post->ID, 'archive_8', true);
	$archive_9 = get_post_meta($post->ID, 'archive_9', true);
	$archive_10 = get_post_meta($post->ID, 'archive_10', true);
	$archive_11 = get_post_meta($post->ID, 'archive_11', true);
	$archive_12 = get_post_meta($post->ID, 'archive_12', true);
	
	$data = NULL;
	for($i=0;$i<13;$i++){
	  $value = explode("|",get_post_meta($post->ID, 'archive_'.$i, true));
	  $data[$i]['type'] = $value[0];
	  $data[$i]['media'] = $value[1];
	  $data[$i]['title'] = $value[2];
	  $data[$i]['description'] = $value[3];
	}	
	
	for($i=0;$i<13;$i++){
	  $isType = $data[$i]['type'];
      echo '<label style="width:20px; float:left;"><strong>'.($i+1).'.</strong></label>';
	 
	  echo '<select id="archive_type_'.$i.'" name="archive_type_'.$i.'" style="float:left;">
	  		  <option value="" '.(($isType=="video") ? 'selected="selected"' : '').'>Select Media Type</option>
			  <option value="video" '.(($isType=="video") ? 'selected="selected"' : '').'>Youtube Video</option>
			  <option value="audio" '.(($isType=="audio") ? 'selected="selected"' : '').'>Audio</option>
			  <option value="image" '.(($isType=="image") ? 'selected="selected"' : '').'>Image</option>
			</select>';
      echo '<input type="text" style="width:400px; float:left;" id="archive_'.$i.'" name="archive_'.$i.'" value="'.$data[$i]['media'].'"/>';
	  echo '<p style="float:left; margin-top:4px;"><a href="javascript:void(0);" class="onClickMediaUpload" rel="'.$i.'">select</a></p>';
      echo '<br style="clear:both;" />';
	  echo '<label style="margin-right:15px;">Title</label>';
	  echo '<input type="text" style="width:220px;" id="archive_title_'.$i.'" name="archive_title_'.$i.'" value="'.$data[$i]['title'].'"/>';
	  echo '<label style="margin-right:15px;">Description</label>';
	  echo '<input type="text" style="width:620px;" id="archive_description_'.$i.'" name="archive_description_'.$i.'" value="'.$data[$i]['description'].'"/>';
	  echo '<br /><br /><hr /><br />';
	}
	
	echo '<script>
	var index = 0;
	
	jQuery(document).ready(function(){ 
	  jQuery(".onClickMediaUpload").click(function(){ 
	  index = jQuery(this).attr("rel");
	  tb_show("", "media-upload.php?type=image&amp;TB_iframe=true");
	  return false;
                     

	  });
	  
	  jQuery(".onClickSetMedia").change(function(){
	    value = jQuery(this).val();
		if(value=="v"){
		  jQuery("#cp_upload").fadeOut();
		   jQuery("#upload_image").val();
		  jQuery(".lbl_media").html("<strong>2. Insert Youtube URL video.</strong>");
		}else if(value=="i"){
			jQuery("#cp_upload").fadeIn();
			 jQuery(".lbl_media").html("<strong>2. Insert your media file.</strong>");
		}
	  });
	  
	  window.send_to_editor = function(html) {
        url = jQuery(html).attr("href");
        jQuery("#archive_"+index).val(url);
        tb_remove();
    }
	  
	});
		</script>';
	
}
   
 
 
 function cp_archive_save_meta($post_id, $post) {
  if(!wp_verify_nonce($_POST, plugin_basename(__FILE__))){ $post->ID; }
  $news_meta['archive_0'] = $_POST['archive_type_0']."|".$_POST['archive_0']."|".$_POST['archive_title_0']."|".$_POST['archive_description_0']."";
  $news_meta['archive_1'] = $_POST['archive_type_1']."|".$_POST['archive_1']."|".$_POST['archive_title_1']."|".$_POST['archive_description_1']."";
  $news_meta['archive_2'] = $_POST['archive_type_2']."|".$_POST['archive_2']."|".$_POST['archive_title_2']."|".$_POST['archive_description_2']."";
  $news_meta['archive_3'] = $_POST['archive_type_3']."|".$_POST['archive_3']."|".$_POST['archive_title_3']."|".$_POST['archive_description_3']."";
  $news_meta['archive_4'] = $_POST['archive_type_4']."|".$_POST['archive_4']."|".$_POST['archive_title_4']."|".$_POST['archive_description_4']."";
  $news_meta['archive_5'] = $_POST['archive_type_5']."|".$_POST['archive_5']."|".$_POST['archive_title_5']."|".$_POST['archive_description_5']."";
  $news_meta['archive_6'] = $_POST['archive_type_6']."|".$_POST['archive_6']."|".$_POST['archive_title_6']."|".$_POST['archive_description_6']."";
  $news_meta['archive_7'] = $_POST['archive_type_7']."|".$_POST['archive_7']."|".$_POST['archive_title_7']."|".$_POST['archive_description_7']."";
  $news_meta['archive_8'] = $_POST['archive_type_8']."|".$_POST['archive_8']."|".$_POST['archive_title_8']."|".$_POST['archive_description_8']."";
  $news_meta['archive_9'] = $_POST['archive_type_9']."|".$_POST['archive_9']."|".$_POST['archive_title_9']."|".$_POST['archive_description_9']."";
  $news_meta['archive_10'] = $_POST['archive_type_10']."|".$_POST['archive_10']."|".$_POST['archive_title_10']."|".$_POST['archive_description_10']."";
  $news_meta['archive_11'] = $_POST['archive_type_11']."|".$_POST['archive_11']."|".$_POST['archive_title_11']."|".$_POST['archive_description_11']."";
  $news_meta['archive_12'] = $_POST['archive_type_12']."|".$_POST['archive_12']."|".$_POST['archive_title_12']."|".$_POST['archive_description_12']."";
  foreach ($news_meta as $key => $value) { 
   if($post->post_type == 'archive'){}
    $value = implode(',', (array)$value);
    if(get_post_meta($post->ID, $key, FALSE)) { update_post_meta($post->ID, $key, $value); } else { add_post_meta($post->ID, $key, $value); }
    //if(!$value) delete_post_meta($post->ID, $key); 
  }

}

add_action('save_post', 'cp_archive_save_meta', 1, 2); // save the custom fields


add_action( 'init', 'cp_archive' );

?>