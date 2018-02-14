<?php

# WORK
function cp_work() {
	$labels = array(
		'name'               => _x( 'Work', 'post type general name' ),
		'singular_name'      => _x( 'Work', 'post type singular name' ),
		'add_new'            => _x( 'Add New', 'work' ),
		'add_new_item'       => __( 'Add New Work' ),
		'edit_item'          => __( 'Edit Work' ),
		'new_item'           => __( 'New Work' ),
		'all_items'          => __( 'All Work' ),
		'view_item'          => __( 'View Work' ),
		'search_items'       => __( 'Search Work' ),
		'not_found'          => __( 'No Work found' ),
		'not_found_in_trash' => __( 'No Work found in the Trash' ), 
		'parent_item_colon'  => '',
		'menu_name'          => 'Work'
	);
	$args = array(
		'labels'        => $labels,
		'description'   => '',
		'public'        => true,
		'menu_position' => 5,
		'supports'      => array('title', 'editor', 'thumbnail'),
		'has_archive'   => true,
		'register_meta_box_cb' => 'cp_work_metabox'
	);
	register_post_type('work', $args );	
}

 add_action( 'add_meta_boxes', 'cp_link_metabox' );

function cp_work_metabox(){  add_meta_box('cp_work_metabox', 'Works', 'cp_work_form_metabox', 'work');  }
function cp_link_metabox(){  add_meta_box('cp_link_metabox', 'Direct Link', 'cp_link_form_metabox', 'work');  }

function cp_link_form_metabox() {
 echo '<input type="text" style="width:620px;" id="dl" name="dl" value="'.get_site_url().'/?id='.$_GET['post'].'&w='.get_post( $post )->post_name.'"/>';
}

function cp_work_form_metabox() {
    global $post;
	$work_0 = get_post_meta($post->ID, 'work_0', true);
	$work_1 = get_post_meta($post->ID, 'work_1', true);
	$work_2 = get_post_meta($post->ID, 'work_2', true);
	$work_3 = get_post_meta($post->ID, 'work_3', true);
	$work_4 = get_post_meta($post->ID, 'work_4', true);
	$work_5 = get_post_meta($post->ID, 'work_5', true);
	$work_6 = get_post_meta($post->ID, 'work_6', true);
	$work_7 = get_post_meta($post->ID, 'work_7', true);
	$work_8 = get_post_meta($post->ID, 'work_8', true);
	$work_9 = get_post_meta($post->ID, 'work_9', true);
	$work_10 = get_post_meta($post->ID, 'work_10', true);
	$work_11 = get_post_meta($post->ID, 'work_11', true);
	$work_12 = get_post_meta($post->ID, 'work_12', true);
	
	$data = NULL;
	for($i=0;$i<13;$i++){
	  $value = explode("|",get_post_meta($post->ID, 'work_'.$i, true));
	  $data[$i]['type'] = $value[0];
	  $data[$i]['media'] = $value[1];
	  $data[$i]['title'] = $value[2];
	  $data[$i]['description'] = $value[3];
	}	
	
	for($i=0;$i<13;$i++){
	  $isType = $data[$i]['type'];
      echo '<label style="width:20px; float:left;"><strong>'.($i+1).'.</strong></label>';
	 
	  echo '<select id="work_type_'.$i.'" name="work_type_'.$i.'" style="float:left;">
	  		  <option value="" '.(($isType=="video") ? 'selected="selected"' : '').'>Select Media Type</option>
			  <option value="video" '.(($isType=="video") ? 'selected="selected"' : '').'>Youtube Video</option>
			  <option value="audio" '.(($isType=="audio") ? 'selected="selected"' : '').'>Audio</option>
			  <option value="image" '.(($isType=="image") ? 'selected="selected"' : '').'>Image</option>
			</select>';
      echo '<input type="text" style="width:400px; float:left;" id="work_'.$i.'" name="work_'.$i.'" value="'.$data[$i]['media'].'"/>';
	  echo '<p style="float:left; margin-top:4px;"><a href="javascript:void(0);" class="onClickMediaUpload" rel="'.$i.'">select</a></p>';
      echo '<br style="clear:both;" />';
	  echo '<label style="margin-right:15px;">Title</label>';
	  echo '<input type="text" style="width:220px;" id="work_title_'.$i.'" name="work_title_'.$i.'" value="'.$data[$i]['title'].'"/>';
	  echo '<label style="margin-right:15px;">Description</label>';
	  echo '<input type="text" style="width:620px;" id="work_description_'.$i.'" name="work_description_'.$i.'" value="'.$data[$i]['description'].'"/>';
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
        jQuery("#work_"+index).val(url);
        tb_remove();
    }
	  
	});
		</script>';
	
}
   
 
 
 function cp_work_save_meta($post_id, $post) {
  if(!wp_verify_nonce($_POST, plugin_basename(__FILE__))){ $post->ID; }
  $news_meta['work_0'] = $_POST['work_type_0']."|".$_POST['work_0']."|".$_POST['work_title_0']."|".$_POST['work_description_0']."";
  $news_meta['work_1'] = $_POST['work_type_1']."|".$_POST['work_1']."|".$_POST['work_title_1']."|".$_POST['work_description_1']."";
  $news_meta['work_2'] = $_POST['work_type_2']."|".$_POST['work_2']."|".$_POST['work_title_2']."|".$_POST['work_description_2']."";
  $news_meta['work_3'] = $_POST['work_type_3']."|".$_POST['work_3']."|".$_POST['work_title_3']."|".$_POST['work_description_3']."";
  $news_meta['work_4'] = $_POST['work_type_4']."|".$_POST['work_4']."|".$_POST['work_title_4']."|".$_POST['work_description_4']."";
  $news_meta['work_5'] = $_POST['work_type_5']."|".$_POST['work_5']."|".$_POST['work_title_5']."|".$_POST['work_description_5']."";
  $news_meta['work_6'] = $_POST['work_type_6']."|".$_POST['work_6']."|".$_POST['work_title_6']."|".$_POST['work_description_6']."";
  $news_meta['work_7'] = $_POST['work_type_7']."|".$_POST['work_7']."|".$_POST['work_title_7']."|".$_POST['work_description_7']."";
  $news_meta['work_8'] = $_POST['work_type_8']."|".$_POST['work_8']."|".$_POST['work_title_8']."|".$_POST['work_description_8']."";
  $news_meta['work_9'] = $_POST['work_type_9']."|".$_POST['work_9']."|".$_POST['work_title_9']."|".$_POST['work_description_9']."";
  $news_meta['work_10'] = $_POST['work_type_10']."|".$_POST['work_10']."|".$_POST['work_title_10']."|".$_POST['work_description_10']."";
  $news_meta['work_11'] = $_POST['work_type_11']."|".$_POST['work_11']."|".$_POST['work_title_11']."|".$_POST['work_description_11']."";
  $news_meta['work_12'] = $_POST['work_type_12']."|".$_POST['work_12']."|".$_POST['work_title_12']."|".$_POST['work_description_12']."";
  foreach ($news_meta as $key => $value) { 
   if($post->post_type == 'work'){}
    $value = implode(',', (array)$value);
    if(get_post_meta($post->ID, $key, FALSE)) { update_post_meta($post->ID, $key, $value); } else { add_post_meta($post->ID, $key, $value); }
    //if(!$value) delete_post_meta($post->ID, $key); 
  }

}

add_action('save_post', 'cp_work_save_meta', 1, 2); // save the custom fields


add_action( 'init', 'cp_work' );

?>