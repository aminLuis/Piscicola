<?php 
require('../../models/m_usuario/m_sesion.php');
$consulta = "SELECT *FROM siembra WHERE siembra='".$siembra."'";
$q = mysqli_query($con,$consulta);

foreach($q as $r){}

$con->close();

?>