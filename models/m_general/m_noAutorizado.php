<?php
require('../../models/m_usuario/m_sesion.php');
if($varSesion['tipo']=='usuarios'){
    echo 'Usted no tiene autorización';
    header('LOCATION: ../../views/v_general/v_noAutorizado.php');
    die();
}
?>