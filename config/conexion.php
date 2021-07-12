<?php

class Conectar{

    function conectar(){
        $con = mysqli_connect("127.0.0.1:33067","root","","Piscicola2") or die ("No se estableción conexión con la base de datos");
    
      return $con;
    }
}

?>