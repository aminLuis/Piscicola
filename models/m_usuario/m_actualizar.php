<?php
require('../../models/m_usuario/m_sesion.php');
require('../../config/connect.php');

if(isset($_POST['nombre']) && $_POST['nombre']!="" &&
   isset($_POST['primerApe']) && $_POST['primerApe']!="" &&
   isset($_POST['segundoApe']) && $_POST['segundoApe']!="" &&
   isset($_POST['direccion']) && $_POST['direccion']!="" &&
   isset($_POST['telefono']) && $_POST['telefono']!=""
){

    $nombre = $_POST['nombre'];
    $primerApe = $_POST['primerApe'];
    $segundoApe = $_POST['segundoApe'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $user = $_GET['user'];
    
    $nombre = mysqli_real_escape_string($con,$nombre);
    $primerApe = mysqli_real_escape_string($con,$primerApe);
    $segundoApe = mysqli_real_escape_string($con,$segundoApe);
    $direccion = mysqli_real_escape_string($con,$direccion);
    $telefono = mysqli_real_escape_string($con,$telefono);
    $user = mysqli_real_escape_string($con,$user);
    

    $sql = "UPDATE usuario SET
     nombre='".$nombre."',
     primerApe='".$primerApe."',
     segundoApe='".$segundoApe."',
     direccion='".$direccion."',
     telefono='".$telefono."'
    WHERE user='".$user."'";


    $query = mysqli_query($con,$sql);

    if(mysqli_error($con)!=null){
    echo mysqli_error($con);
    }else{
      header('LOCATION: ../../views/v_usuario/v_crearUsuario.php');
    }


}else{
    echo 'Hay campos vacios o no definidos';
}


?>