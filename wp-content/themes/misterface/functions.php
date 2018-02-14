<?php
add_action('after_setup_theme', 'blankslate_setup');
function blankslate_setup(){
load_theme_textdomain('blankslate', get_template_directory() . '/languages');
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'post-thumbnails' );
global $content_width;
if ( ! isset( $content_width ) ) $content_width = 640;
register_nav_menus(
array( 'main-menu' => __( 'Main Menu', 'blankslate' ) )
);
}
add_action('comment_form_before', 'blankslate_enqueue_comment_reply_script');
function blankslate_enqueue_comment_reply_script()
{
if(get_option('thread_comments')) { wp_enqueue_script('comment-reply'); }
}
add_filter('the_title', 'blankslate_title');
function blankslate_title($title) {
if ($title == '') {
return 'Untitled';
} else {
return $title;
}
}
add_filter('wp_title', 'blankslate_filter_wp_title');
function blankslate_filter_wp_title($title)
{
return $title . esc_attr(get_bloginfo('name'));
}
add_filter('comment_form_defaults', 'blankslate_comment_form_defaults');
function blankslate_comment_form_defaults( $args )
{
$req = get_option( 'require_name_email' );
$required_text = sprintf( ' ' . __('Required fields are marked %s', 'blankslate'), '<span class="required">*</span>' );
$args['comment_notes_before'] = '<p class="comment-notes">' . __('Your email is kept private.', 'blankslate') . ( $req ? $required_text : '' ) . '</p>';
$args['title_reply'] = __('Post a Comment', 'blankslate');
$args['title_reply_to'] = __('Post a Reply to %s', 'blankslate');
return $args;
}
add_action( 'init', 'blankslate_add_shortcodes' );
function blankslate_add_shortcodes() {
add_shortcode('wp_caption', 'fixed_img_caption_shortcode');
add_shortcode('caption', 'fixed_img_caption_shortcode');
add_filter('img_caption_shortcode', 'blankslate_img_caption_shortcode_filter',10,3);
add_filter('widget_text', 'do_shortcode');
}
function blankslate_img_caption_shortcode_filter($val, $attr, $content = null)
{
extract(shortcode_atts(array(
'id'	=> '',
'align'	=> '',
'width'	=> '',
'caption' => ''
), $attr));
if ( 1 > (int) $width || empty($caption) )
return $val;
$capid = '';
if ( $id ) {
$id = esc_attr($id);
$capid = 'id="figcaption_'. $id . '" ';
$id = 'id="' . $id . '" aria-labelledby="figcaption_' . $id . '" ';
}
return '<figure ' . $id . 'class="wp-caption ' . esc_attr($align) . '" style="width: '
. (10 + (int) $width) . 'px">' . do_shortcode( $content ) . '<figcaption ' . $capid 
. 'class="wp-caption-text">' . $caption . '</figcaption></figure>';
}
add_action( 'widgets_init', 'blankslate_widgets_init' );
function blankslate_widgets_init() {
register_sidebar( array (
'name' => __('Sidebar Widget Area', 'blankslate'),
'id' => 'primary-widget-area',
'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
'after_widget' => "</li>",
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
}
$preset_widgets = array (
'primary-aside'  => array( 'search', 'pages', 'categories', 'archives' ),
);
function blankslate_get_page_number() {
if (get_query_var('paged')) {
print ' | ' . __( 'Page ' , 'blankslate') . get_query_var('paged');
}
}
function blankslate_catz($glue) {
$current_cat = single_cat_title( '', false );
$separator = "\n";
$cats = explode( $separator, get_the_category_list($separator) );
foreach ( $cats as $i => $str ) {
if ( strstr( $str, ">$current_cat<" ) ) {
unset($cats[$i]);
break;
}
}
if ( empty($cats) )
return false;
return trim(join( $glue, $cats ));
}
function blankslate_tag_it($glue) {
$current_tag = single_tag_title( '', '',  false );
$separator = "\n";
$tags = explode( $separator, get_the_tag_list( "", "$separator", "" ) );
foreach ( $tags as $i => $str ) {
if ( strstr( $str, ">$current_tag<" ) ) {
unset($tags[$i]);
break;
}
}
if ( empty($tags) )
return false;
return trim(join( $glue, $tags ));
}
function blankslate_commenter_link() {
$commenter = get_comment_author_link();
if ( ereg( '<a[^>]* class=[^>]+>', $commenter ) ) {
$commenter = preg_replace( '/(<a[^>]* class=[\'"]?)/', '\\1url ' , $commenter );
} else {
$commenter = preg_replace( '/(<a )/', '\\1class="url "' , $commenter );
}
$avatar_email = get_comment_author_email();
$avatar = str_replace( "class='avatar", "class='photo avatar", get_avatar( $avatar_email, 80 ) );
echo $avatar . ' <span class="fn n">' . $commenter . '</span>';
}
function blankslate_custom_comments($comment, $args, $depth) {
$GLOBALS['comment'] = $comment;
$GLOBALS['comment_depth'] = $depth;
?>
<li id="comment-<?php comment_ID() ?>" <?php comment_class() ?>>
<div class="comment-author vcard"><?php blankslate_commenter_link() ?></div>
<div class="comment-meta"><?php printf(__('Posted %1$s at %2$s', 'blankslate' ), get_comment_date(), get_comment_time() ); ?><span class="meta-sep"> | </span> <a href="#comment-<?php echo get_comment_ID(); ?>" title="<?php _e('Permalink to this comment', 'blankslate' ); ?>"><?php _e('Permalink', 'blankslate' ); ?></a>
<?php edit_comment_link(__('Edit', 'blankslate'), ' <span class="meta-sep"> | </span> <span class="edit-link">', '</span>'); ?></div>
<?php if ($comment->comment_approved == '0') { echo '\t\t\t\t\t<span class="unapproved">'; _e('Your comment is awaiting moderation.', 'blankslate'); echo '</span>\n'; } ?>
<div class="comment-content">
<?php comment_text() ?>
</div>
<?php
if($args['type'] == 'all' || get_comment_type() == 'comment') :
comment_reply_link(array_merge($args, array(
'reply_text' => __('Reply','blankslate'),
'login_text' => __('Login to reply.', 'blankslate'),
'depth' => $depth,
'before' => '<div class="comment-reply-link">',
'after' => '</div>'
)));
endif;
?>
<?php }
function blankslate_custom_pings($comment, $args, $depth) {
$GLOBALS['comment'] = $comment;
?>
<li id="comment-<?php comment_ID() ?>" <?php comment_class() ?>>
<div class="comment-author"><?php printf(__('By %1$s on %2$s at %3$s', 'blankslate'),
get_comment_author_link(),
get_comment_date(),
get_comment_time() );
edit_comment_link(__('Edit', 'blankslate'), ' <span class="meta-sep"> | </span> <span class="edit-link">', '</span>'); ?></div>
<?php if ($comment->comment_approved == '0') { echo '\t\t\t\t\t<span class="unapproved">'; _e('Your trackback is awaiting moderation.', 'blankslate'); echo '</span>\n'; } ?>
<div class="comment-content">
<?php comment_text() ?>
</div>
<?php } ?>
<?php
#CUSTOM POST
include_once('_cp/cp.awards.php');
include_once('_cp/cp.tvcredits.php');
include_once('_cp/cp.people.php');
include_once('_cp/cp.clients.php');
include_once('_cp/cp.work.php');
include_once('_cp/cp.archives.php');
include_once('_cp/cp.news.php');

#CLIENTS
function get_clients(){
  $args = array(
  	'post_type'  => 'client',
	'posts_per_page'  => -1,
	'order'           => 'ASC',
	'meta_key'        => '',
	'meta_value'      => '',
	'post_status'     => 'publish',
	'suppress_filters' => true );
  $data = get_posts($args);
  $clients = NULL;
  for($i=0;$i<count($data);$i++){
	$image = wp_get_attachment_image_src(get_post_thumbnail_id($data[$i]->ID),'full');
    $clients[$i]['client'] = $data[$i]->post_title;
	$clients[$i]['image'] = $image[0];
  }
  return $clients;
 }

#WORKS
function get_works(){
  $args = array(
  	'post_type'  => 'work',
	'posts_per_page'  => -1,
	'order'           => 'ASC',
	'meta_key'        => '',
	'meta_value'      => '',
	'post_status'     => 'publish',
	'suppress_filters' => true );
  $data = get_posts($args);
  $works = NULL;
  for($i=0;$i<count($data);$i++){
	$image = wp_get_attachment_image_src(get_post_thumbnail_id($data[$i]->ID),'full');
	$works[$i]['id'] = $data[$i]->ID;
    $works[$i]['work'] = $data[$i]->post_title;
	$works[$i]['image'] = $image[0];
  }
  return $works;
}

function get_archivess(){
  $args = array(
  	'post_type'  => 'archive',
	'posts_per_page'  => -1,
	'order'           => 'ASC',
	'meta_key'        => '',
	'meta_value'      => '',
	'post_status'     => 'publish',
	'suppress_filters' => true );
  $data = get_posts($args);
  $archives = NULL;
  for($i=0;$i<count($data);$i++){
	$image = wp_get_attachment_image_src(get_post_thumbnail_id($data[$i]->ID),'full');
	$archives[$i]['id'] = $data[$i]->ID;
    $archives[$i]['work'] = $data[$i]->post_title;
	$archives[$i]['image'] = $image[0];
  }
  return $archives;
}


#PEOPLE
function get_people(){
  $args = array(
  	'post_type'  => 'people',
	'posts_per_page'  => -1,
	'order'           => 'ASC',
	'meta_key'        => '',
	'meta_value'      => '',
	'post_status'     => 'publish',
	'suppress_filters' => true );
  $data = get_posts($args);
  $people = NULL;
  for($i=0;$i<count($data);$i++){
	$post_meta = get_post_meta($data[$i]->ID);
	$image = wp_get_attachment_image_src(get_post_thumbnail_id($data[$i]->ID),'full');
	$people[$i]['id'] = $data[$i]->ID;
    $people[$i]['name'] = $data[$i]->post_title;
	$people[$i]['position'] = $post_meta['position'][0];
	$people[$i]['email'] = $post_meta['email'][0];
	$people[$i]['alias'] = $post_meta['alias'][0];
	$people[$i]['extra'] = $post_meta['extra'][0];
	$people[$i]['brief'] = $data[$i]->post_content;
	$people[$i]['image'] = $image[0];
  }
  return $people;
} 

#NEWS
function get_news(){
  $args = array(
  	'post_type'  => 'news',
	'posts_per_page'  => -1,
	'order'           => 'ASC',
	'meta_key'        => '',
	'meta_value'      => '',
	'post_status'     => 'publish',
	'suppress_filters' => true );
  $data = get_posts($args);
  $news = NULL;
  for($i=0;$i<count($data);$i++){
	$post_meta = get_post_meta($data[$i]->ID);
    $news[$i]['title'] = $data[$i]->post_title;
	$news[$i]['link'] = $post_meta['link'][0];
	$news[$i]['url'] = $post_meta['url'][0];
	$news[$i]['date'] = $post_meta['date'][0];
  }
  return $news;
 } 
 
 
#AWARDS
function get_awards(){
  $args = array(
  	'post_type'  => 'award',
	'posts_per_page'  => -1,
	'order'           => 'ASC',
	'meta_key'        => '',
	'meta_value'      => '',
	'post_status'     => 'publish',
	'suppress_filters' => true );
  $data = get_posts($args);
  $awards = NULL;
  for($i=0;$i<count($data);$i++){
    $awards[$i] = $data[$i]->post_title;
  }
  return $awards;
}  

#TVCREDITS
function get_tvcredits(){
  $args = array(
  	'post_type'  => 'tvcredit',
	'posts_per_page'  => -1,
	'order'           => 'ASC',
	'meta_key'        => '',
	'meta_value'      => '',
	'post_status'     => 'publish',
	'suppress_filters' => true );
  $data = get_posts($args);
  $tvcredits = NULL;
  for($i=0;$i<count($data);$i++){
    $tvcredits[$i] = $data[$i]->post_title;
  }
  return $tvcredits;
}  
 
 
#WORK SHORTCODE
function work_func($atts, $content = null) {
   extract(shortcode_atts(array('title' => '','desc' => ''), $atts));
   $buffer = ' <div class="item"><h3><a href="#" rel="'.do_shortcode($content).'">'.$title.'</a></h3><p>'.$desc.'</p><img  /></div>';
   return $buffer;
}
add_shortcode('work', 'work_func'); 
 

function get_ID_by_slug($page_slug) {
  $page = get_page_by_path($page_slug);
  if($page){ return $page->ID; }else{ return NULL; }
}

?>