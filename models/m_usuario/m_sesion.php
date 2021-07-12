<?php
session_start();
error_reporting(0);
$varsesion = $_SESSION['usuario'];
if($varsesion == null || $varsesion == ''){
    echo 'No ha iniciado sesión, no tiene autorización'; 
    header('LOCATION: ../../views/v_general/v_noSesion.php');
    die();
}else{
    $varSesion = $_SESSION['usuario'];
}
?>