<?php
require('../../models/m_usuario/m_sesion.php');
$sq = "SELECT *FROM alimento";
$qr = mysqli_query($con,$sq);
$i = 0;
foreach($qr as $rw){
   $alimentos[$i] = $rw['tipo'];
   $i++;
}

?>