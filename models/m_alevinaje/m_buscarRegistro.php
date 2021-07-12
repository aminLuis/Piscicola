<?php
require('../../models/m_usuario/m_sesion.php');
//require('../../config/connect.php');

$sqlRegistro = "SELECT *FROM registroSalida WHERE lagoEngorde='".$row['lago']."' AND siembra='".$row['siembra']."'";
$queryRegistro = mysqli_query($con,$sqlRegistro);

?>