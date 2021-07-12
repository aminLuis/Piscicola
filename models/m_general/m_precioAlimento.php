<?php
require('../../models/m_usuario/m_sesion.php');
$sq = "SELECT *FROM alimento WHERE tipo='".$alimento."'";

$qr = mysqli_query($con,$sq);

foreach($qr as $aliment){}


?>