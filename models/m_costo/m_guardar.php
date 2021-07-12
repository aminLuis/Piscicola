<?php
require('../../models/m_usuario/m_sesion.php');
require('../../config/connect.php');

if(isset($_POST['lago']) && $_POST['lago']!="" &&
   isset($_POST['siembra']) && $_POST['siembra']!="" &&
   isset($_POST['alimento']) && $_POST['alimento']!="" &&
   isset($_POST['alevino']) && $_POST['alevino']!="" &&
   isset($_POST['bacteria']) && $_POST['bacteria']!="" &&
   isset($_POST['energia']) && $_POST['energia']!="" &&
   isset($_POST['nomina']) && $_POST['nomina']!="" &&
   isset($_POST['asistencia']) && $_POST['asistencia']!="" &&
   isset($_POST['jornales']) && $_POST['jornales']!="" &&
   isset($_POST['proceso']) && $_POST['proceso']!="" &&
   isset($_POST['insumo']) && $_POST['insumo']!="" &&
   isset($_POST['combustible']) && $_POST['combustible']!="" &&
   isset($_POST['chinchorro']) && $_POST['chinchorro']!="" &&
   isset($_POST['hielo']) && $_POST['hielo']!="" &&
   isset($_POST['tiros']) && $_POST['tiros']!="" &&
   isset($_POST['equipos']) && $_POST['equipos']!="" &&
   isset($_POST['otro']) && $_POST['otro']!="" &&
   isset($_POST['fecha']) && $_POST['fecha']!=""
){

$lago = $_POST['lago'];
$siembra = $_POST['siembra'];

$consulta = "SELECT *FROM costosTotales WHERE lago='".$lago."' AND siembra='".$siembra."'";
$qr = mysqli_query($con,$consulta);

$cont = mysqli_num_rows($qr);

if($cont>0){
    header('LOCATION: ../../views/v_costos/v_validacionCosto.php');
}else{

$alimento = $_POST['alimento'];
$alevino = $_POST['alevino'];
$bacteria = $_POST['bacteria'];
$energia = $_POST['energia'];
$nomina = $_POST['nomina'];
$asistencia = $_POST['asistencia'];
$jornales = $_POST['jornales'];
$proceso = $_POST['proceso'];
$insumo = $_POST['insumo'];
$combustible = $_POST['combustible'];
$chinchorro = $_POST['chinchorro'];
$hielo = $_POST['hielo'];
$tiros = $_POST['tiros'];
$equipos = $_POST['equipos'];
$otro = $_POST['otro'];
$fecha = $_POST['fecha'];

$total = $alimento+$alevino+$bacteria+$energia+$nomina+$asistencia+$jornales+$proceso+$insumo+$combustible+$chinchorro+$hielo+$tiros+$equipos+$otro;

$costoKilo = 0;

$alimento = mysqli_real_escape_string($con,$alimento);
$alevino = mysqli_real_escape_string($con,$alevino);
$bacteria = mysqli_real_escape_string($con,$bacteria);
$energia = mysqli_real_escape_string($con,$energia);
$nomina = mysqli_real_escape_string($con,$nomina);
$asistencia = mysqli_real_escape_string($con,$asistencia);
$jornales = mysqli_real_escape_string($con,$jornales);
$proceso = mysqli_real_escape_string($con,$proceso);
$insumo = mysqli_real_escape_string($con,$insumo);
$combustible = mysqli_real_escape_string($con,$combustible);
$chinchorro = mysqli_real_escape_string($con,$chinchorro);
$hielo = mysqli_real_escape_string($con,$hielo);
$tiros = mysqli_real_escape_string($con,$tiros);
$equipos = mysqli_real_escape_string($con,$equipos);
$otro = mysqli_real_escape_string($con,$otro);
$total = mysqli_real_escape_string($con,$total);
$costoKilo = mysqli_real_escape_string($con,$costoKilo);
$lago = mysqli_real_escape_string($con,$lago);
$siembra = mysqli_real_escape_string($con,$siembra);
$fecha = mysqli_real_escape_string($con,$fecha);



//Para verificar que el lago en levante ha sido liquidado
$sqlSalida = "SELECT *FROM salida WHERE lago='".$lago."' AND siembra='".$siembra."'";
$querySalida = mysqli_query($con,$sqlSalida);

foreach($querySalida as $rwSalida){}

//Para verificar que el lago ha sido liquidado en alevinaje
//en caso dado se vaya a calcular el costo de un lago en alevinaje
$sqlAlevinaje = "SELECT *FROM alevinaje WHERE lago='".$lago."' AND siembra='".$siembra."'";
$queryAlevinaje = mysqli_query($con,$sqlAlevinaje);

foreach($queryAlevinaje as $rwAlevinaje){}


if($rwSalida['estado']=='NO ACTIVO' || $rwAlevinaje['salida']=='SALIO'){

$sqlLevante = "SELECT *FROM levante WHERE lago='".$lago."' AND siembra='".$siembra."'";
$queryLevante = mysqli_query($con,$sqlLevante);

$kilogramos = 0;

foreach($queryLevante as $rwLevante){
    $kilogramos = $kilogramos + $rwLevante['kilogramos'];
}

if($kilogramos>0){
    $costoKilo = $total/$kilogramos;
}

$costoKilo = mysqli_real_escape_string($con,$costoKilo);

$sql = "INSERT INTO costosTotales(
    alimentoFlete,
    alevino,
    bacteria,
    energia,
    nomina,
    asistencia,
    jornales,
    proceso,
    insumo,
    combustible,
    chinchorro,
    hielo,
    tiros,
    depEquipos,
    otro,
    total,
    costoKilo,
    lago,
    siembra,
    fecha
) VALUES(
    '$alimento',
    '$alevino',
    '$bacteria',
    '$energia',
    '$nomina',
    '$asistencia',
    '$jornales',
    '$proceso',
    '$insumo',
    '$combustible',
    '$chinchorro',
    '$hielo',
    '$tiros',
    '$equipos',
    '$otro',
    '$total',
    '$costoKilo',
    '$lago',
    '$siembra',
    '$fecha'
)";


     $query =  mysqli_query($con,$sql);
                
     echo mysqli_error($con);
                
     header('LOCATION: ../../views/v_costos/v_historialCostos.php');
   

}else{
    header('LOCATION: ../../views/v_costos/v_noLiquidado.php');
    echo 'El lago no ha sido liquidado';
}


}



}else{
    echo 'Campos vacios';
   // header('LOCATION: ../../views/v_costos/v_validacionCosto.php');
}

$con -> close();

?>