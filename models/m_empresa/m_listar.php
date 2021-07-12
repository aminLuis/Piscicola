<?php
require('../../models/m_usuario/m_sesion.php');
//require('../../config/connect.php');
$sql = "SELECT *FROM empresa";
$queryEmpresa = mysqli_query($con,$sql);
foreach($queryEmpresa as $rowEmpresa){}
$con->close();
?>