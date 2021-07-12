<?php
require('../../models/m_usuario/m_sesion.php');
require('../../config/connect.php');
   
    $lago = mysqli_real_escape_string($con,$lago);
    $siembra = mysqli_real_escape_string($con,$siembra);
   

    $sql = "SELECT *FROM alevinaje WHERE lago='".$lago."' AND siembra='".$siembra."'";
    $query = mysqli_query($con,$sql);

    if(mysqli_error($con)){
        echo mysqli_error($con);
    }else{

        foreach($query as $row){}

     $mortandad = 0;
     $diferencia = 0;

    

     $diferencia = $row['cantidad'] - $row['saldo'];
     $mortandad = ($diferencia*100) / $row['cantidad'];
     $mortandad = 100 - $mortandad; 

     if($mortandad==0){
        $mortandad = 100;
    }

    $salieron = $row['cantidad'] - $diferencia;
    if($salieron==$row['cantidad']){
        $salieron = 0;
    }

    }


$con -> close();

?>