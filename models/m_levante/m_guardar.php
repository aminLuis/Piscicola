<?php
require('../../models/m_usuario/m_sesion.php');
require('../../config/connect.php');

if(isset($_POST['lago']) && $_POST['lago']!="" &&
  isset($_POST['siembra']) && $_POST['siembra']!="" &&
  isset($_POST['unidades']) && $_POST['unidades']!="" &&
  isset($_POST['kilogramos']) && $_POST['kilogramos']!="" &&
  isset($_POST['promedio']) && $_POST['promedio']!="" &&
  isset($_POST['numero']) && $_POST['numero']!="" &&
  isset($_POST['precio']) && $_POST['precio']!= "" &&
  isset($_POST['animal']) && $_POST['animal']!= "" &&
  isset($_POST['fecha']) && $_POST['fecha']!=""
){

    $lago = $_POST['lago'];
    $siembra = $_POST['siembra'];
    $unidades = $_POST['unidades'];
    $kilogramos = $_POST['kilogramos'];
    $promedio = $_POST['promedio'];
    $numero = $_POST['numero'];
    $precio = $_POST['precio'];
    $animal = $_POST['animal'];
    $fecha = $_POST['fecha'];

    $tempUnidades = $unidades;
    
    $lago = mysqli_real_escape_string($con,$lago);
    $siembra = mysqli_real_escape_string($con,$siembra);
    $unidades = mysqli_real_escape_string($con,$unidades);
    $kilogramos = mysqli_real_escape_string($con,$kilogramos);
    $promedio = mysqli_real_escape_string($con,$promedio);
    $numero = mysqli_real_escape_string($con,$numero);
    $precio = mysqli_real_escape_string($con,$precio);
    $animal = mysqli_real_escape_string($con,$animal);
    $fecha = mysqli_real_escape_string($con,$fecha);
    

    $sql = "INSERT INTO levante(
        lago,
        siembra,
        unidades,
        kilogramos,
        promedio,
        numero,
        precio,
        animal,
        fecha
    ) VALUES(
        '$lago',
        '$siembra',
        '$unidades',
        '$kilogramos',
        '$promedio',
        '$numero',
        '$precio',
        '$animal',
        '$fecha'
    )";

    
    /**
      * Consulta para verificar si el lago y siembra ingresados en el 
      * formulario de 'levante' existen en SALIDA y así hallar la cantidad
      * ingresada al lago en el que se hizo el registro en el módulo 'alevinaje'
      * y la 'labor', es decir, que haya salido.
     **/

    //$labor = 'Sale de lago';
    $sqlAlevinaje = "SELECT *FROM salida WHERE lago='".$lago."' AND siembra='".$siembra."' AND animal='".$animal."'";
    $queryAlevinaje = mysqli_query($con,$sqlAlevinaje);

    foreach($queryAlevinaje as $alevino){}
    
    if($alevino['codigo']!=null && $alevino['estado']=='ACTIVO'){

           
             if($tempUnidades>$alevino['saldo']){
                 echo 'El número de pesces a registrar es mayor al saldo disponible en el lago';
             }else{

               
                $query = mysqli_query($con,$sql);

                $diferencia = $alevino['saldo'] - $tempUnidades;
                $sqlDescuento = "UPDATE salida SET saldo='".$diferencia."' WHERE codigo='".$alevino['codigo']."'";
                $queryDescuento = mysqli_query($con,$sqlDescuento);

                if(mysqli_error($con)!=null){
                echo mysqli_error($con);
                        }else{
                            header('LOCATION: ../../views/v_levante/v_guardar.php');
                        }

             }

                
    }else{
        header('LOCATION: ../../views/v_levante/v_validarLago.php');
    }



}else{
    echo 'Error: hay campos vacios';
}

$con -> close();

?>