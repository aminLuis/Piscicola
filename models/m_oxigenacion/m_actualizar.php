<?php
require('../../models/m_usuario/m_sesion.php');
require('../../config/connect.php');

if(isset($_POST['lago']) && $_POST['lago']!="" &&
   isset($_POST['siembra']) && $_POST['siembra']!="" &&
   isset($_POST['oxigeno']) && $_POST['oxigeno']!="" &&
   isset($_POST['temperatura']) && $_POST['temperatura']!="" &&
   isset($_POST['fecha']) && $_POST['fecha']!=""
){

$codigo = $_GET['codigo'];

$lago = $_POST['lago'];
$siembra = $_POST['siembra'];
$oxigeno = $_POST['oxigeno'];
$temperatura = $_POST['temperatura'];
$fecha = $_POST['fecha'];

$codigo = mysqli_real_escape_string($con,$codigo);
$lago = mysqli_real_escape_string($con,$lago);
$siembra = mysqli_real_escape_string($con,$siembra);
$oxigeno = mysqli_real_escape_string($con,$oxigeno);
$temperatura = mysqli_real_escape_string($con,$temperatura);
$fecha = mysqli_real_escape_string($con,$fecha);

$sql = "UPDATE oxigenacion SET 
   lago = '".$lago."',
   siembra = '".$siembra."',
   oxigeno = '".$oxigeno."',
   temperatura = '".$temperatura."',
   fecha = '".$fecha."'
WHERE codigo = '".$codigo."'";

 $query = mysqli_query($con,$sql);

 if(mysqli_error($con)!=null){
     echo mysqli_error($con);
 }else{
     header('LOCATION: ../../views/v_oxigenacion/v_guardar.php');
 }

}else{
    echo 'Hay campos vacios o no definidos';
}

?>