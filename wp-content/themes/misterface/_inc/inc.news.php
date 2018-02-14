<div class="holder" align="left">
  <div id="slider">
    <ul>
  <?php
  $news = get_news();
  $buffer = '';
  for($i=0;$i<count($news);$i++){
	$buffer .= '<li><div class="feed">
        <div class="snetworks">
          <a href="http://www.facebook.com/sharer.php?t=The most interesting writers room in the country creating ideas and content for brands&u='.urlencode($_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]).'" target="_blank"><img src="'.get_template_directory_uri().'/_img/btn_fb.png" width="29" height="29" /></a>
          <a href="http://twitter.com/intent/tweet?url=http://'.$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"].'&text=The most interesting writers room in the country creating ideas and content for brands" target="_blank"><img src="'.get_template_directory_uri().'/_img/btn_tw.png" width="29" height="29" /></a>
          <br class="clear" />
        </div>
        <p align="right" class="date">'.$news[$i]['date'].'</p>
        <h1><a href="'.$news[$i]['url'].'" target="_blank">'.$news[$i]['title'].'</a></h1>
        <h2>'.$news[$i]['link'].'</a></h2>
        <br />
      </div>
      <br class="clear" />
	  </li>';
  }
  echo $buffer;
  ?>
  </ul>
  </div>
  <a href="javascript:void(0)" class="prev"><img src="<?php echo get_template_directory_uri(); ?>/_img/btn_down.png" width="40" height="40" /></a>
  <a href="javascript:void(0)" class="next"><img src="<?php echo get_template_directory_uri(); ?>/_img/btn_up.png" width="40" height="40" /></a>
  
</div>