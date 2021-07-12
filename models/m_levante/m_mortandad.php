<?php
require('../../models/m_usuario/m_sesion.php');
require('../../config/connect.php');

$sql = "SELECT *FROM salida WHERE lago='".$lago."' AND siembra='".$siembra."'";

$lago = mysqli_real_escape_string($con,$lago);
$siembra = mysqli_real_query($con,$siembra);

$query = mysqli_query($con,$sql);

foreach($query as $row){}

$diferencia = $row['cantidad'] - $row['saldo'];
$mortandad = ($diferencia*100)/$row['cantidad'];
$mortandad = 100 - $mortandad;

?>