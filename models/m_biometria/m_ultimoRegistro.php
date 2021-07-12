<?php
require('../../models/m_usuario/m_sesion.php');
$mayor = 0;

foreach($query as $row){

    if($row['codigo']>$mayor){
        $mayor = $row['codigo'];
    }
}

?>