<?php
require('../../models/m_usuario/m_sesion.php');
require('../../config/conexion.php'); 

if(isset($_POST['labor']) && $_POST['labor']!="" &&
   isset($_POST['descripcion']) && $_POST['descripcion']!="" &&
   isset($_POST['lago']) && $_POST['lago']!="" &&
   isset($_POST['animal']) && $_POST['animal']!="" &&
   isset($_POST['pesoPromedio']) && $_POST['pesoPromedio']!="" &&
   isset($_POST['cantidad']) && $_POST['cantidad']!="" &&
   isset($_POST['siembra']) && $_POST['siembra']!="" &&
   isset($_POST['nota']) &&
   isset($_POST['fecha']) && $_POST['fecha']!=""
){

$labor = $_POST['labor'];
$descripcion = $_POST['descripcion'];
$lago = $_POST['lago'];
$animal = $_POST['animal'];
$pesoPromedio = $_POST['pesoPromedio'];
$cantidad = $_POST['cantidad'];
$saldo = $cantidad;
$siembra = $_POST['siembra'];
$nota = $_POST['nota'];
$salida = 'SIN SALIR';
$fecha = $_POST['fecha'];

if($nota==""){
    $nota = "No incluyó nota";
}

$conex = new Conectar();
$con = $conex -> conectar();

$labor = mysqli_real_escape_string($con,$labor);
$descripcion = mysqli_real_escape_string($con,$descripcion);
$lago = mysqli_real_escape_string($con,$lago);
$animal = mysqli_real_escape_string($con,$animal);
$pesoPromedio = mysqli_real_escape_string($con,$pesoPromedio);
$cantidad = mysqli_real_escape_string($con,$cantidad);
$saldo = mysqli_real_escape_string($con,$saldo);
$siembra = mysqli_real_escape_string($con,$siembra);
$nota = mysqli_real_escape_string($con,$nota);
$fecha = mysqli_real_escape_string($con,$fecha);


$sql = "INSERT INTO alevinaje(
    labor,
    descripcion,
    lago,
    animal,
    pesoPromedio,
    cantidad,
    saldo,
    siembra,
    nota,
    salida,
    fecha
) VALUES(
    '$labor',
    '$descripcion',
    '$lago',
    '$animal',
    '$pesoPromedio',
    '$cantidad',
    '$saldo',
    '$siembra',
    '$nota',
    '$salida',
    '$fecha'
)";

$query = mysqli_query($con,$sql);

header('LOCATION: ../../views/v_alevinaje/v_guardar.php');

}else{
    echo 'Hay campos vacios o no definidos';
}

?>