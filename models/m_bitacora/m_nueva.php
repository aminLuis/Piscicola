<?php
require('../../models/m_usuario/m_sesion.php');
require('../../config/connect.php');

if(isset($_POST['autor']) && $_POST['autor']!="" &&
   isset($_POST['asunto']) && $_POST['asunto']!="" &&
   isset($_POST['notacion']) && $_POST['notacion']!=""
){

 $autor = $_POST['autor'];
 $asunto = $_POST['asunto'];
 $notacion = $_POST['notacion'];
 $fecha = date('Y-m-d');
 ini_set('date.timezone','America/Bogota'); 
 $hora = date("g:i A");

 $autor = mysqli_real_escape_string($con,$autor);
 $asunto = mysqli_real_escape_string($con,$asunto);
 $notacion = mysqli_real_escape_string($con,$notacion);
 $fecha = mysqli_real_escape_string($con,$fecha);
 $hora = mysqli_real_escape_string($con,$hora);


 $sql = "INSERT INTO bitacora(
     autor,
     asunto,
     notacion,
     fecha,
     hora
 ) VALUES(
     '$autor',
     '$asunto',
     '$notacion',
     '$fecha',
     '$hora'
 )";

     $query = mysqli_query($con,$sql);

     if(mysqli_error($con)!=null){
         echo mysqli_error($con);
     }else{
         header('LOCATION: ../../views/v_bitacora/v_nueva.php');
     }

}else{
    echo 'Hay campos vacios o no definidos';
}

?>