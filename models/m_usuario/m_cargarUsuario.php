<?php
require('../../models/m_usuario/m_sesion.php');
require('../../config/connect.php');
$sql = "SELECT *FROM usuario WHERE user='".$user."'";
$query = mysqli_query($con,$sql);
?>