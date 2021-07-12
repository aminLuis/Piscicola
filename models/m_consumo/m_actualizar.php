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

//El dato precio no se actualiza en el formulario
//de editar, se debe tomar desde la tabla de alimento,
//del mismo modo sucede con el costo del flete

$precioAlimento = $aliment['precio'];
$flete = $aliment['flete'];


$lago = $_POST['lago'];
$animal = $_POST['animal'];
$kilos = $_POST['kilos'];
$siembra = $_POST['siembra'];
$fecha = $_POST['fecha'];

$codigo = $_GET['codigo'];

$alimento = mysqli_real_escape_string($con,$alimento);
$lago = mysqli_real_escape_string($con,$lago);
$animal = mysqli_real_escape_string($con,$animal);
$kilos = mysqli_real_escape_string($con,$kilos);
$siembra = mysqli_real_escape_string($con,$siembra);
$fecha = mysqli_real_escape_string($con,$fecha);


$sql = "UPDATE consumo SET 
alimento='".$alimento."',
lago='".$lago."',
animal='".$animal."',
kilos='".$kilos."',
precio='".$precioAlimento."',
flete='".$flete."',
siembra='".$siembra."',
fecha='".$fecha."'
WHERE
codigo='".$codigo."';
";


$sqlConsumo = "SELECT *FROM consumo WHERE codigo='".$codigo."'";
$queryConsumo = mysqli_query($con,$sqlConsumo);
foreach($queryConsumo as $rowConsumo){}



$suma = $aliment['kilos'] + $rowConsumo['kilos'];

if($suma<$kilos){
  
    echo 'Los kilos a ingresar son mayores a los disponibles en el stock';
    
     }else{

         $diferencia = $suma - $kilos;

        $query = mysqli_query($con,$sql);

        $sqlAlimento = "UPDATE alimento SET kilos='".$diferencia."' WHERE codigo='".$aliment['codigo']."'";
        $queryAlimento = mysqli_query($con,$sqlAlimento);

        header('LOCATION: ../../views/v_consumo/v_guardar.php');

        }

}else{
      echo 'Hay campos vacios o no definidos';
}

?>