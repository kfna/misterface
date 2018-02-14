<div class="holder">
   <ul>
  <?php
  $clients = get_clients();
  $buffer = '';
  for($i=0;$i<count($clients);$i++){
    $buffer .= '<li><img src="'.$clients[$i]['image'].'" width="204" height="166" /></li>';
  }
  echo $buffer;
  ?>
  </ul>
  <br class="clear" />
</div>