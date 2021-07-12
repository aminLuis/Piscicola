<?php
require('../../models/m_usuario/m_sesion.php');
require('../../config/connect.php');

if(isset($_POST['la']) && $_POST['la']!="" &&
   isset($_POST['area']) && $_POST['area']!=""
){

$codigo = $_GET['codigo'];
$area = $_POST['area'];

$la  = mysqli_real_escape_string($con,$la);
$area = mysqli_real_escape_string($con,$area);

$sql = "UPDATE lago SET 
   area='".$area."'
   WHERE codigo='".$codigo."';
";

$query = mysqli_query($con,$sql);

header('LOCATION: ../../views/v_admin/v_lagos.php');

}

?>