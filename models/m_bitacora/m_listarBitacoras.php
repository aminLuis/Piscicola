<?php
require('../../models/m_usuario/m_sesion.php');
require('../../config/connect.php');
$sql = "SELECT *FROM bitacora ORDER BY fecha";
$query = mysqli_query($con,$sql);
?>