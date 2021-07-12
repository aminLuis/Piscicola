<?php
require('../../models/m_usuario/m_sesion.php');
require('../../config/connect.php');

if(isset($_POST['alimento']) && $_POST['alimento']!="" &&
   isset($_POST['lago']) && $_POST['lago']!="" &&
   isset($_POST['animal']) && $_POST['animal']!="" &&
   isset($_POST['kilos']) && $_POST['kilos']!="" &&
   isset($_POST['siembra']) && $_POST['siembra']!="" &&
   isset($_POST['fecha']) && $_POST['fecha']!=""
){

$alimento = $_POST['alimento'];
require('./../m_general/m_precioAlimento.php');

$precioAlimento = $aliment['precio'];
$flete = $aliment['flete'];

$lago = $_POST['lago'];
$animal = $_POST['animal'];
$kilos = $_POST['kilos'];
$siembra = $_POST['siembra'];
$fecha = $_POST['fecha'];

if($kilos>$aliment['kilos']){

   header('LOCATION: ../../views/v_consumo/v_alimentoAgotado.php');

}else{

$alimento = mysqli_real_escape_string($con,$alimento);
$lago = mysqli_real_escape_string($con,$lago);
$animal = mysqli_real_escape_string($con,$animal);
$kilos = mysqli_real_escape_string($con,$kilos);
$precioAlimento = mysqli_real_escape_string($con,$precioAlimento);
$flete = mysqli_real_escape_string($con,$flete);
$siembra = mysqli_real_escape_string($con,$siembra);
$fecha = mysqli_real_escape_string($con,$fecha);

$sql = "INSERT INTO consumo(
    alimento,
    lago,
    animal,
    kilos,
    precio,
    flete,
    siembra,
    fecha
) VALUES(
    '$alimento',
    '$lago',
    '$animal',
    '$kilos',
    '$precioAlimento',
    '$flete',
    '$siembra',
    '$fecha'
)";

$query = mysqli_query($con,$sql);

$cod = $aliment['codigo'];
$diferecia = $aliment['kilos'] - $kilos;

$consulta = "UPDATE alimento SET kilos='".$diferecia."' WHERE codigo='".$cod."'";
$q = mysqli_query($con,$consulta);

header('LOCATION: ../../views/v_consumo/v_guardar.php');
}

}else{
    echo 'Hay campos vacios o no definidos';
}


?>