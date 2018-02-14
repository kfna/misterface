<?php
date_default_timezone_set('America/Monterrey');
require_once("../_admin/_class/class.cupon.php");
$objCupon = new Cupon();
$objCupon->set_vigencia(true)->set_publicar(1);
$objCupon->set_order("likes DESC");
$cupon = $objCupon->set_debug(false)->getCupon();


$buffer = '<table border="1">';
for($i=0;$i<count($cupon);$i++){
  $buffer .= '<tr>
  				<td><a href="http://cuponisimo.mx/index.php?v='.$cupon[$i]['id'].'"><img src="uploads/coupons/'.$cupon[$i]['id'].'/'.$cupon[$i]['imagen'].'" width="292" height="219" border="0" /></a></td>
				<td>'.$cupon[$i]['titulo'].'<td>
			  </tr>';
}
$buffer .= '</table>';
echo $buffer;

?>
    