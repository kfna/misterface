<?php
$iPod    = stripos($_SERVER['HTTP_USER_AGENT'],"iPod");
$iPhone  = stripos($_SERVER['HTTP_USER_AGENT'],"iPhone");
$iPad  = stripos($_SERVER['HTTP_USER_AGENT'],"iPad");

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta http-equiv="content-type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta content="text/html;charset=utf-8" http-equiv="Content-Type">
<meta content="utf-8" http-equiv="encoding">
<?php if($iPad){ ?>
<meta name="viewport" content="width=device-width,initial-scale=.8,user-scalable=no">
<?php }else{ ?>
<meta name="viewport" content="width=device-width,initial-scale=.3,user-scalable=no">
<?php } ?>
<title><?php wp_title(' | ', true, 'right'); ?></title>
<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>" />
<link href="<?php echo get_template_directory_uri(); ?>/_font/font.css" rel="stylesheet" type="text/css" />
<link type="text/css" href="<?php echo get_template_directory_uri(); ?>/skin/jplayer.blue.monday.css" rel="stylesheet" />
<link href='http://fonts.googleapis.com/css?family=News+Cycle:400,700' rel='stylesheet' type='text/css'>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js" ></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/_js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/_js/mf.js"></script>
<script type="text/javascript" src="http://www.youtube.com/player_api"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/_lib/jplayer/jquery.jplayer.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/_js/jcarousellite.js"></script>
<script>
$(document).ready(function(){ 
<?php
if(isset($_GET['w'])){ 
  $id = $_GET['id'];
  echo "overlay('work','id=".$id."');";
}
?>
});
</script>

<?php wp_head(); ?>
</head>
<body>

<div id="logo"><a href="javascript:goTo(0)"><img src="<?php echo get_template_directory_uri(); ?>/_img/ologo.png" width="203" height="23" border="0"></a></div>

<div id="menu" style="position:absolute; z-index:100000000;">
  <ul>
    <li class="init"><a href="javascript:goTo(1)" class="onClickGoTo isMenuItem" rel="about">about us</a></li>
    <li><a href="javascript:goTo(3)" class="onClickGoTo isMenuItem" rel="clients">clients</a></li>
    <li style="margin-left:26px; width: 99px;"><a href="javascript:goTo(4)" class="onClickGoTo isMenuItem" rel="work">our work</a></li>
    <li style="width:100px;"><a href="javascript:goTo(6)" class="onClickGoTo isMenuItem" rel="news">news</a></li>
    <li style="margin-left:8px;"><a href="javascript:goTo(7)" class="onClickGoTo isMenuItem" rel="contact">contact</a></li>
    </ul>
</div>

<div id="background" style="position:fixed; top:-50%; left:-50%; width:200%; height:200%; z-index:0">
  <img id="fullimage_01" src="<?php echo get_template_directory_uri(); ?>/_img/bck_02.jpg" style=" position:absolute; top:0; left:0; right:0; bottom:0; margin:auto; min-width:50%; min-height:50%;" class="on isBackground" />
  <img id="fullimage_02" src="<?php echo get_template_directory_uri(); ?>/_img/bck_01.jpg" style=" position:absolute; top:0; left:0; right:0; bottom:0; margin:auto; min-width:50%; min-height:50%;" class="off isBackground" />
</div>

<div id="social_networks">
  <ul>
    <li><a href="http://www.linkedin.com/company/mister-face" class="in" target="_blank"></a></li>
    <li><a href="https://twitter.com/MisterFaceNY" class="tw" target="_blank"></a></li>
    <li><a href="http://www.youtube.com/user/MisterFaceNY" class="yt" target="_blank"></a></li>
  </ul>
</div>

<div id="overlay">
  <div class="logo"><img src="<?php echo get_template_directory_uri(); ?>/_img/ologo.png" width="203" height="23"></div>
  <div class="close"><a href="javascript:overlay_close()"><img src="<?php echo get_template_directory_uri(); ?>/_img/btn_back.png" width="120" height="40"></a></div>
  <div id="overlay_loader"></div>
</div>
