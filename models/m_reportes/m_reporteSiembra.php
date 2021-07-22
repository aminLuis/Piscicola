<?php
require('../../models/m_usuario/m_sesion.php');
require('../../config/connect.php');

$sqlAlevinaje = "SELECT *FROM alevinaje WHERE siembra='".$siembra."'";
$querySiembra = mysqli_query($con,$sqlAlevinaje);


$lagos = array();
foreach($querySiembra as $rowAlevinaje){
  $lagos[]=$rowAlevinaje['lago'];
}

$mensaje = 'Hola mundo!';
?>