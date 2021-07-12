<?php
require('../../models/m_usuario/m_sesion.php');
 $totalPesoGanado = 0;
 $totalAlimentoDado = 0;
 $totalConversion = 0;

 foreach($query as $row){

    if($row['codigo']!=$mayor){
        $totalAlimentoDado = $totalAlimentoDado + $row['kilosDia'];
    }
 }

?>