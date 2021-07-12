<?php
require('../../models/m_usuario/m_sesion.php');
require('../../models/m_usuario/m_sesion.php');
$menor = 0;
$i = 0;

foreach($query as $row){
    
    if($i==0){
        $menor = $row['codigo'];
    }
    if($row['codigo']<$menor){
        $menor = $row['codigo'];
    }

    $i++;
}

?>