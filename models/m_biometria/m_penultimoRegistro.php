<?php
require('../../models/m_usuario/m_sesion.php');
$penultimo = 0;

foreach($query as $row){

    if($row['codigo']!=$mayor){
        if($row['codigo']>$penultimo){
            $penultimo = $row['codigo'];
        }
    }
}

?>