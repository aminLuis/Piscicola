<?php
require('../../models/m_usuario/m_sesion.php');
require('../../config/connect.php');
$codigo = mysqli_real_escape_string($con,$codigo);
$sql = "SELECT *FROM oxigenacion WHERE codigo='".$codigo."'";
$query = mysqli_query($con,$sql);
?>