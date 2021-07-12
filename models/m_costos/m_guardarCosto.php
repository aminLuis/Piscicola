<?php
require('../../models/m_usuario/m_sesion.php');
require('../../config/connect.php');

if(isset($_POST['lago']) && $_POST['lago']!="" &&
   isset($_POST['siembra']) && $_POST['siembra']!="" &&
   isset($_POST['aliemento']) && $_POST['aliemento']!="" &&
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


//También se debe calcular porcentaje de participación y la totalidad
//Se debe incluir también el lago y la siembra, para poder filtrar
//en el historial

$total = $alimento+$alevino+$bacteria+$energia+$nomina+$asistencia+$jornales+$proceso+$insumo+$combustible+$chinchorro+$hielo+$tiros+$equipos+$otro;

$alimento = mysql_real_escape_string($con,$alimento);
$alevino = mysql_real_escape_string($con,$alevino);
$bacteria = mysql_real_escape_string($con,$bacteria);
$energia = mysql_real_escape_string($con,$energia);
$nomina = mysql_real_escape_string($con,$nomina);
$asistencia = mysql_real_escape_string($con,$asistencia);
$jornales = mysql_real_escape_string($con,$jornales);
$proceso = mysql_real_escape_string($con,$proceso);
$insumo = mysql_real_escape_string($con,$insumo);
$combustible = mysql_real_escape_string($con,$combustible);
$chinchorro = mysql_real_escape_string($con,$chinchorro);
$hielo = mysql_real_escape_string($con,$hielo);
$tiros = mysql_real_escape_string($con,$tiros);
$equipos = mysql_real_escape_string($con,$equipos);
$otro = mysql_real_escape_string($con,$otro);
$total = mysql_real_escape_string($con,$total);
$lago = mysql_real_escape_string($con,$lago);
$siembra = mysql_real_escape_string($con,$siembra);
$fecha = mysql_real_escape_string($con,$fecha);


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
    '$lago',
    '$siembra',
    '$fecha'
)";


$query = mysqli_query($con,$sql);
//header('LOCATION: ../../views/v_costos/v_parametrosCostos.php');

echo mysqli_error($con);

}

?>