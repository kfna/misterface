<?php
  $twitter = get_post(175, ARRAY_A);
  $whatsnew = get_post(178, ARRAY_A);
  ?>
<div id="footer">
  <div class="left">
    <p><?php echo $whatsnew['post_content']; ?></p>
  </div>
  <div class="right">
    <a href="javascript:overlay('reel')" class="link onDemoReelClick white">QUICK LINK TO OUR <span class="green">HIGHLIGHT REEL</span></a>
  </div>
</div>

</body>
</html>