<div class="holder">
  <h1 class="section">THE PEOPLE</h1>
   <ul>
  <?php
  $share = 'Check out the Creative Minds of MISTER :-| FACE at:http://iurl.no/362v7';
  $people = get_people();
  $buffer = '';
  for($i=0;$i<count($people);$i++){
    $buffer .= '<li>';
	if($i==0 || $i==1){
	  $buffer .= '<div id="p_'.$people[$i]['id'].'" class="info_top_left">
	   			    <div class="left">
					  <div class="picture" style="background: url('.$people[$i]['image'].');"></div>
					  <div class="share">
					    <a href="http://twitter.com/intent/tweet?url=http://'.$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"].'&amp;text=The most interesting writers room in the country creating ideas and content for brands" target="_blank"><img src="'.get_template_directory_uri().'/_img/btn_tw.png" width="29" height="29" /></a>
						<a href="http://www.facebook.com/sharer.php?t=The most interesting writers room in the country creating ideas and content for brands&u='.urlencode($_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]).'" target="_blank"><img src="'.get_template_directory_uri().'/_img/btn_fb.png" width="29" height="29" /></a>
						<a href="#" class="cursor"><img src="'.get_template_directory_uri().'/_img/img_share.png" width="45" height="29" /></a>
						<br class="clear" />
					  </div>
					</div>
					<div class="right">
					  <a href="javascript:void(0)" class="close onClickClosePeople" rel="p_'.$people[$i]['id'].'">
					    <img src="'.get_template_directory_uri().'/_img/btn_close.png" width="60" height="60" />
					  </a>
					  <h1 class="name">'.$people[$i]['name'].'</h1>
					  <h2 class="position">'.$people[$i]['position'].'</h2>
					  <p class="email">'.$people[$i]['email'].'</a>
					  <p class="brief">'.$people[$i]['brief'].'</p>
					</div>
					<br class="clear" />
				  </div>';	
	}
	if($i==2 || $i==3){
	  $buffer .= '<div id="p_'.$people[$i]['id'].'" class="info_top_right">
					<div class="left">
					  <a href="javascript:void(0)" class="close onClickClosePeople" rel="p_'.$people[$i]['id'].'">
					    <img src="'.get_template_directory_uri().'/_img/btn_close.png" width="60" height="60" />
					  </a>
					  <h1 class="name">'.$people[$i]['name'].'</h1>
					  <h2 class="position">'.$people[$i]['position'].'</h2>
					  <p class="email">'.$people[$i]['email'].'</a>
					  <p class="brief">'.$people[$i]['brief'].'</p>
					</div>
					<div class="right">
					  <div class="picture" style=" background: url('.$people[$i]['image'].');"></div>
					  <div class="share">
					    <a href="http://twitter.com/intent/tweet?url=http://'.$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"].'&amp;text=The most interesting writers room in the country creating ideas and content for brands" target="_blank"><img src="'.get_template_directory_uri().'/_img/btn_tw.png" width="29" height="29" /></a>
						<a href="http://www.facebook.com/sharer.php?t=The most interesting writers room in the country creating ideas and content for brands&u='.urlencode($_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]).'" target="_blank"><img src="'.get_template_directory_uri().'/_img/btn_fb.png" width="29" height="29" /></a>
						<a href="#" class="cursor"><img src="'.get_template_directory_uri().'/_img/img_share.png" width="45" height="29" /></a>
						<br class="clear" />
					  </div>
					</div>
					<br class="clear" />
				  </div>';	
	}
	if($i==4 || $i==5 || $i==8 || $i==9){
	  $buffer .= '<div id="p_'.$people[$i]['id'].'" class="info_bot_left">
	   			    <div class="left">
					  
					  <div class="share">
					    <a href="http://twitter.com/intent/tweet?url=http://'.$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"].'&amp;text=The most interesting writers room in the country creating ideas and content for brands" target="_blank"><img src="'.get_template_directory_uri().'/_img/btn_tw.png" width="29" height="29" /></a>
						<a href="http://www.facebook.com/sharer.php?t=The most interesting writers room in the country creating ideas and content for brands&u='.urlencode($_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]).'" target="_blank"><img src="'.get_template_directory_uri().'/_img/btn_fb.png" width="29" height="29" /></a>
						<a href="#" class="cursor"><img src="'.get_template_directory_uri().'/_img/img_share.png" width="45" height="29" /></a>
						<br class="clear" />
					  </div>
					  <div class="picture" style=" background: url('.$people[$i]['image'].');"></div>
					</div>
					<div class="right">
					  <a href="javascript:void(0)" class="close onClickClosePeople" rel="p_'.$people[$i]['id'].'">
					    <img src="'.get_template_directory_uri().'/_img/btn_close.png" width="60" height="60" />
					  </a>
					  <h1 class="name">'.$people[$i]['name'].'</h1>
					  <h2 class="position">'.$people[$i]['position'].'</h2>
					  <p class="email">'.$people[$i]['email'].'</a>
					  <p class="brief">'.$people[$i]['brief'].'</p>
					</div>
					<br class="clear" />
				  </div>';	
	}
	

	if($i==6 || $i==7 || $i==10 || $i==11){
	  $buffer .= '<div id="p_'.$people[$i]['id'].'" class="info_bot_right">
					<div class="left">
					  <a href="javascript:void(0)" class="close onClickClosePeople" rel="p_'.$people[$i]['id'].'">
					    <img src="'.get_template_directory_uri().'/_img/btn_close.png" width="60" height="60" />
					  </a>
					  <h1 class="name">'.$people[$i]['name'].'</h1>
					  <h2 class="position">'.$people[$i]['position'].'</h2>
					  <p class="email">'.$people[$i]['email'].'</a>
					  <p class="brief">'.$people[$i]['brief'].'</p>
					</div>
					<div class="right">
					  <div class="share">
					    <a href="http://twitter.com/intent/tweet?url=http://'.$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"].'&amp;text=The most interesting writers room in the country creating ideas and content for brands" target="_blank"><img src="'.get_template_directory_uri().'/_img/btn_tw.png" width="29" height="29" /></a>
						<a href="http://www.facebook.com/sharer.php?t=The most interesting writers room in the country creating ideas and content for brands&u='.urlencode($_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]).'" target="_blank"><img src="'.get_template_directory_uri().'/_img/btn_fb.png" width="29" height="29" /></a>
						<a href="#" class="cursor"><img src="'.get_template_directory_uri().'/_img/img_share.png" width="45" height="29" /></a>
						<br class="clear" />
					  </div>
					  <div class="picture" style=" background: url('.$people[$i]['image'].');"></div>
					</div>
					<br class="clear" />
				  </div>';	
	}	
	$buffer .=  '<a href="#" style=" background: url('.$people[$i]['image'].');" class="onClickPeople isPeople"><p align="center" style=" line-height:27px;">| '.$people[$i]['alias'].' |<br /> '.$people[$i]['extra'].'</p></a>
				</li>';
  }
  echo $buffer;
  ?>
  
  
  </ul>
  <br class="clear" />
</div>