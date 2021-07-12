<?php
require('../../models/m_usuario/m_sesion.php');
$sq = "SELECT *FROM siembra WHERE siembra='".$siembra."'";
$qr = mysqli_query($con,$sq); 
?>