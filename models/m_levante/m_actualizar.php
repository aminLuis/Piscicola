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
  isset($_POST['fecha']) && $_POST['fecha']!=""
){

    $codigo = $_GET['codigo'];

    $lago = $_POST['lago'];
    $siembra = $_POST['siembra'];
    $unidades = $_POST['unidades'];
    $kilogramos = $_POST['kilogramos'];
    $promedio = $_POST['promedio'];
    $numero = $_POST['numero'];
    $precio = $_POST['precio'];
    $fecha = $_POST['fecha'];

    $tempUnidades = $unidades;

    $lago = mysqli_real_escape_string($con,$lago);
    $siembra = mysqli_real_escape_string($con,$siembra);
    $unidades = mysqli_real_escape_string($con,$unidades);
    $kilogramos = mysqli_real_escape_string($con,$kilogramos);
    $promedio = mysqli_real_escape_string($con,$promedio);
    $numero = mysqli_real_escape_string($con,$numero);
    $precio = mysqli_real_escape_string($con,$precio);
    $fecha = mysqli_real_escape_string($con,$fecha);


    $sqlLevante = "SELECT *FROM levante WHERE codigo='".$codigo."'";
    $queryLevante = mysqli_query($con,$sqlLevante);

    foreach($queryLevante as $levat){}

    $kg = $levat['kilogramos'];
    $unid = $levat['unidades'];

    $sql = "UPDATE levante SET
      lago='".$lago."',
      siembra='".$siembra."',
      unidades='".$unidades."',
      kilogramos='".$kilogramos."',
      promedio='".$promedio."',
      numero='".$numero."',
      precio='".$precio."',
      fecha='".$fecha."'
     WHERE codigo='".$codigo."'";


    $labor = 'Sale de lago';
    $sqlSalida = "SELECT *FROM salida WHERE lago='".$lago."' AND siembra='".$siembra."'";
    $querySalida = mysqli_query($con,$sqlSalida);

    foreach($querySalida as $rowSalida){}

    if($rowSalida['estado']=='ACTIVO'){


        $suma = $rowSalida['saldo'] + $levat['unidades'];

        $diferencia = $suma - $unidades;
           
        if($diferencia>$rowSalida['saldo'] || $rowSalida['saldo']<=0){
            echo 'El número de pesces a registrar es mayor al saldo disponible en el lago';
        }else{
          
           $query = mysqli_query($con,$sql);
         
           $sqlDescuento = "UPDATE salida SET saldo='".$diferencia."' WHERE codigo='".$rowSalida['codigo']."'";
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

$con->close();

?>