<?php
require('../../models/m_usuario/m_sesion.php');
require('../../config/connect.php');

if(isset($_POST['la']) && $_POST['la']!="" &&
   isset($_POST['area']) && $_POST['area']!=""
){


$la = $_POST['la'];
$area = $_POST['area'];

$la  = mysqli_real_escape_string($con,$la);
$area = mysqli_real_escape_string($con,$area);

$sq = "SELECT *FROM lago WHERE lag='".$la."'";
$qr = mysqli_query($con,$sq);

foreach($qr as $r){}

if($r['area']!=0){
echo 'El lago ya tiene area registrada';
}else{


$sql = "INSERT INTO lago(
    lag,
    area
) VALUES(
    '$la',
    '$area'
)";

$query = mysqli_query($con,$sql);

header('LOCATION: ../../views/v_admin/v_lagos.php');

}

}

?>