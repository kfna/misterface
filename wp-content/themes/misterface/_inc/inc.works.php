<div class="holder">
   <ul>
  <?php
  $works = get_works();
  $buffer = '';
  for($i=0;$i<count($works);$i++){
    $buffer .= '<li><a href="javascript:overlay(\'work\',\'id='.$works[$i]['id'].'\')" style=" background: url('.$works[$i]['image'].');"></a></li>';
  }
  echo $buffer;
  ?>
  </ul>
  <br class="clear" />
  <h1 class="go_archives" style="color: #86ed00;
font-family: Conv_NewsCycle-Regular,Helvetica, Arial, Times, Serif;
font-size: 20pt; font-weight:normal !important;"><a href="javascript:goTo(5)" class="green" style="text-decoration:none;">MORE WORK</a></h1>
</div>



