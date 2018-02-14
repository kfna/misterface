<?php
  $home = get_post(181, ARRAY_A);
  ?>
<div class="logo" align="center"><img class="img_home" src="<?php echo get_template_directory_uri(); ?>/_img/img_logo.png" width="407" height="71" /></div>
<div class="intro"><p align="center"><?php echo $home['post_content']; ?></p></div>
