<div class="holder">
  <h1 class="section">MORE WORK</h1>
   <ul>
  <?php
  $archives = get_archivess();
  $buffer = '';
  for($i=0;$i<count($archives);$i++){
    $buffer .= '<li><a href="javascript:overlay(\'archive\',\'id='.$archives[$i]['id'].'\')" style=" background: url('.$archives[$i]['image'].');"></a></li>';
  }
  echo $buffer;
  ?>
  </ul>
  <br class="clear" />
</div>