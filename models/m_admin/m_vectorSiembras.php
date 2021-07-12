<?php
require('../../models/m_usuario/m_sesion.php');
//$c = $conex -> conectar();

$sq = "SELECT *FROM siembra";

$siembras = mysqli_query($con,$sq);

$i = 0;
foreach($siembras as $row){

    if($row['estado']){
    $siembra[$i] = $row['siembra'];

    $i++;
    }
}

?>