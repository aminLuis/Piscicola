<?php
require('../../models/m_usuario/m_sesion.php');
require('../../config/connect.php');
$sql = "SELECT *FROM levante WHERE codigo='".$codigo."'";
$query = mysqli_query($con,$sql);
//$con -> close();
?>