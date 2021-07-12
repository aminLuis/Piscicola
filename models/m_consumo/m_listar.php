<?php
require('../../models/m_usuario/m_sesion.php');
require('../../config/connect.php');
$sql = "SELECT *FROM consumo";
$query = mysqli_query($con,$sql);
?>