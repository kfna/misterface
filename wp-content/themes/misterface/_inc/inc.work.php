<?php
require_once('../../../../wp-blog-header.php');
$work = get_post($_GET['id'],ARRAY_A);
$post_meta = get_post_meta($_GET['id']);

$work_data = NULL;
for($i=0;$i<count($post_meta);$i++){
  $work_data[$i] = $post_meta['work_'.$i];
}


$works = NULL;
for($i=0;$i<13;$i++){
  $tmp = explode("|",$work_data[$i][0]);
  $works[$i]['title'] = $tmp[2];
  $works[$i]['brief'] = $tmp[3];
  $works[$i]['type'] = $tmp[0];
  $works[$i]['media'] = $tmp[1];
}

$image = wp_get_attachment_image_src(get_post_thumbnail_id($_GET['id']),'full');

?>
<style>
#work_detail { -webkit-font-smoothing: antialiased; font-weight:400 !important;}
#work_detail { width:1024px; margin:auto; margin-top:100px;}
#work_detail .left { width:250px; height:208px;  float:left;}
#work_detail .left .picture { width:250px; height:208px; float:left; }
#work_detail .right { width:770px; min-height:500px;  float:left;}

#work_detail .right .info { width:550px; font-family: 'News Cycle', sans-serif;
font-weight:400 !important;
font-size: 14px;
 margin-bottom:0;
 line-height:15px;
 font-weight:bold !important;
 margin-top:50px;
}
 
 #work_detail .right .info p { width:550px; font-family: 'News Cycle', sans-serif;
font-weight:400 !important;
font-size: 14px;
margin-top: 20px;
 margin-bottom:0;
 line-height:15px;
 font-weight:bold !important;
 }
 
 
#work_detail .gallery { margin-top:20px; width:770px;}
#work_detail .gallery .container { width:550px; float:left; }
#work_detail .gallery .container .holder { width:540px; margin:auto; }
#work_detail .gallery .container .holder ul { margin:0; padding:0; list-style:none;}
#work_detail .gallery .container .holder ul li { float:right; margin-left:5px;}

#work_detail .gallery .submenu { width:200px;float:left; margin-left:10px;}
#work_detail .gallery .submenu ul { margin:0; padding:0; list-style:square; color:#86ed00 !important; margin-top:26px; margin-left:20px;}
#work_detail .gallery .submenu ul li h3 { margin:0; padding:0;  }
#work_detail .gallery .submenu ul li { margin-bottom:10px;}
#work_detail .gallery .submenu ul li h3 a { font-family: 'News Cycle', sans-serif; font-size: 14px; color:#86ed00; text-decoration: none;  } 
#work_detail .gallery .submenu ul li h3 a span:hover { color:#86ed00 !important}
#work_detail .gallery .submenu ul li h3 a span.active { color:#86ed00 !important}
</style>
<div id="work_detail"> 
  <div class="left">
    <div class="picture" style="background: url(<?php echo $image[0] ?>) no-repeat top center; background-position: -40px -208px;"></div>
  </div>
  <div class="right">
    <div class="info"><p><?php echo apply_filters('the_content', strip_shortcodes($work['post_content'])); ?></div>
    <div 	class="gallery">
    <div class="container">
      <div class="holder">
        <div class="player" style="margin-left:-5px;"><iframe id="player" src="" frameborder="0" width="540" height="320"></iframe></div>
        <div class="image" style="margin-left:-5px;"><img id="wimg" src="" style=" max-width:540px;" /></div>
        <div class="audio" style="margin-left:-5px;"><?php include_once("inc.jplayer.php"); ?></div>
        <div class="social">
          <ul>
            <li><a href="http://twitter.com/intent/tweet?url=http://<?php echo $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]; ?>&text=The most interesting writers room in the country creating ideas and content for brands" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/_img/btn_tw.png" width="29" height="29" /></a></li>
            <li><a href="http://www.facebook.com/sharer.php?t=The most interesting writers room in the country creating ideas and content for brands&u=<?php echo urlencode($_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/_img/btn_fb.png" width="29" height="29" /></a></li>
            <li><img src="<?php echo get_template_directory_uri(); ?>/_img/img_share.png" width="47" height="29" /></li>
          </ul>
          <br class="clear" />
        </div>
      </div>
    </div>
    
    <div class="submenu">
    <?php
	$pattern = get_shortcode_regex();
	preg_match('/'.$pattern.'/s', $work['post_content'], $matches);
	if(is_array($matches) && $matches[2] == 'work') {
   	$shortcode = $matches[0];
   	echo do_shortcode($shortcode);
	}
	?>
    <ul>
      <?php
	  $first = NULL;
	  for($i=0;$i<count($works);$i++){
		$tmp = $works[$i];
		if($tmp['title']!=""){
		  if($tmp['type']=="video"){
	        echo '<li><h3><a href="javascript:loadVideo(\''.$tmp['media'].'\')"><span class="white onClickGreen">'.$tmp['title'].'</span></a></h3></li>';
		  }else if($tmp['type']=="image"){
	        echo '<li><h3><a href="javascript:loadImage(\''.$tmp['media'].'\');"><span class="white onClickGreen">'.$tmp['title'].'</span></a></h3></li>';
		  }else if($tmp['type']=="audio"){
	        echo '<li><h3><a href="javascript:loadAudio(\''.$tmp['media'].'\');"><span class="white onClickGreen">'.$tmp['title'].'</span></a></h3></li>';
		  }
		  if($i==0){ $first = $tmp; }
		}
	  }
	  ?>
      
    </ul>
    </div>
    
    
    
    
  </div>
  <br class="clear" />
</div>
  
  


<script>

function loadVideo(vid){
  $("#jquery_jplayer_1").jPlayer("stop");
  $('.player').show();
  $('.audio').hide();
  $('.image').hide();
  $("#player").attr("src","");
  $("#player").attr("src",'http://www.youtube.com/embed/'+vid+'?rel=0&wmode=Opaque&enablejsapi=1');
}

function loadImage(url){
  $("#jquery_jplayer_1").jPlayer("stop");
  stopVideo();
  $('.image').show();
  $('.player').hide();
  $('.audio').hide();
  $('#wimg').attr("src",url);
}

function stopVideo(){
	  //$(".player").fadeOut(200);
  $("#player").attr("src","");
}
</script>

<script type="text/javascript">
    $(document).ready(function(){
	  
	  $(".onClickGreen").click(function(){
		$(".onClickGreen").removeClass('active');
	    $(this).addClass('active');
	  });	
		
      $("#jquery_jplayer_1").jPlayer({
        ready: function (){ },
        swfPath: "/js",
        supplied: "mp3"
      });
	  
	  $('.onClickCloseWork').click(function(){ 
	    $("#jquery_jplayer_1").jPlayer("stop");
	  });
	  
	    <?php
  if($first['type']=="video"){ echo 'loadVideo("'.$first['media'].'");'; }
  if($first['type']=="audio"){ echo 'loadAudio("'.$first['media'].'");'; }
  if($first['type']=="image"){ echo 'loadImage("'.$first['media'].'");'; }
	  ?>
	  
    });
	
	function loadAudio(url){
	  $('.audio').show();
	  $('.player').hide();
	  $('.image').hide();
	  $("#jquery_jplayer_1").jPlayer("setMedia", { mp3: url, });
	  //$("#jquery_jplayer_1").jPlayer("play");
	}
	
	
	$(document).ready(function(){
      $("#jquery_jplayer_1").jPlayer({
        ready: function () {
          $(this).jPlayer("setMedia", { mp3: "<?php echo $first['media']; ?>" });
        },
        swfPath: "/js",
        supplied: "mp3"
      });
	  
	  $('.onClickCloseWork').click(function(){ 
	    $("#jquery_jplayer_1").jPlayer("stop");
	  });
	  
	  
    });
  </script>
