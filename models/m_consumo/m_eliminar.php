<?php
require('../../models/m_usuario/m_sesion.php');
require('../../config/connect.php');

$codigo = $_GET['codigo'];

$sqlConsumo = "SELECT *FROM consumo WHERE codigo='".$codigo."'";
$queryConsumo = mysqli_query($con,$sqlConsumo);

foreach($queryConsumo as $rowConsumo){}

$alimento = $rowConsumo['alimento'];
require('./../m_general/m_precioAlimento.php');

$suma = $aliment['kilos'] + $rowConsumo['kilos'];

$sql = "DELETE FROM consumo WHERE codigo='".$codigo."'";

$query = mysqli_query($con,$sql);

if(mysqli_error($con)!=null){
    echo mysqli_error($con);
}else{

    $sqlAli = "UPDATE alimento SET kilos='".$suma."' WHERE tipo='".$rowConsumo['alimento']."'";
    $queryAli = mysqli_query($con,$sqlAli);

}


header('LOCATION: ../../views/v_consumo/v_guardar.php');

?>