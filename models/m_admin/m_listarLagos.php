<?php
require('../../models/m_usuario/m_sesion.php');
require('../../config/connect.php');
$sql = "SELECT *FROM lago";
$query = mysqli_query($con,$sql);
?>