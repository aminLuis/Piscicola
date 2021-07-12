<?php
require('../../models/m_usuario/m_sesion.php');
$consulta = "SELECT *FROM siembra";

$q = mysqli_query($con,$consulta);

$i = 0;
foreach($q as $r){
    if($r['estado']){
        $siembras[$i] = $r['siembra'];
        $i++;
    }

}
    
   
?>