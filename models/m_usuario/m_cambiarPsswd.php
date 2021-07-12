<?php
require('../../models/m_usuario/m_sesion.php');
require('../../config/connect.php');

if(isset($_POST['user']) && $_POST['user']!="" &&
   isset($_POST['passwd']) && $_POST['passwd']!=""
){

$tipo = $_GET['tipo'];    
$user = $_POST['user'];
$passwd = password_hash($_POST['passwd'], PASSWORD_DEFAULT, ['cost' => 10]);

$user = mysqli_real_escape_string($con,$user);
$passwd = mysqli_real_escape_string($con,$passwd);

$sql = "UPDATE usuario SET passwd='".$passwd."' WHERE user='".$user."'";

$query = mysqli_query($con,$sql);

if(mysqli_error($con)){
    echo mysqli_error($con);
}else{

    if($tipo=='admin' || $tipo=='root'){
    header('LOCATION: ../../views/v_admin/home.php');
    }else{
     header('LOCATION: ../../views/v_userFinal/home.php');
    }
}

}else{
    echo 'Hay campos vacios o no definidos';
}

$con -> close();

?>