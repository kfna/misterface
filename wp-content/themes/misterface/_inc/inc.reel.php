<div id="reel">
  <div class="player"><iframe id="player" src="http://www.youtube.com/embed/1QjP-8P4i8g?rel=0&wmode=Opaque&enablejsapi=1" frameborder="0" width="640" height="480"></iframe></div>
  <div class="share">
    <ul>
      <li><a href="http://www.facebook.com/sharer.php?t=The most interesting writers room in the country creating ideas and content for brands&u=<?php echo urlencode($_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]); ?>" target="_blank"><img src="wp-content/themes/misterface/_img/btn_fb.png" width="29" height="29" /></a></li>
      <li><a href="http://twitter.com/intent/tweet?url=http://<?php echo $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]; ?>&amp;text=The most interesting writers room in the country creating ideas and content for brands" target="_blank"><img src="wp-content/themes/misterface/_img/btn_tw.png" width="29" height="29" /></a></li>
    </ul>
    <br class="clear" />
  </div>
</div>

<script>

function stopVideo(){
	  //$(".player").fadeOut(200);
  $("#player").attr("src","");
}
</script>