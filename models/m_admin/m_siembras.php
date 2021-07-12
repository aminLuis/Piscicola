<?php
require('../../models/m_usuario/m_sesion.php');
require('../../config/connect.php');

$siembra = $_POST['siembra'];
$estado = true;
$area = $_POST['area'];
$fecha = $_POST['fecha'];

$sql = "INSERT INTO siembra(
    siembra,
    estado,
    area,
    fecha
) VALUES(
    '$siembra',
    '$estado',
    '$area',
    '$fecha'
)";

$query = mysqli_query($con,$sql);
header('LOCATION: ../../views/v_admin/v_configuracion.php');
?>