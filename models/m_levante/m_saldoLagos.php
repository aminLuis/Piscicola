<?php
require('../../models/m_usuario/m_sesion.php');
require('../../config/connect.php');
$labor = 'Sale de lago';
$sql = "SELECT *FROM alevinaje WHERE labor='".$labor."'";
$query = mysqli_query($con,$sql);
?>