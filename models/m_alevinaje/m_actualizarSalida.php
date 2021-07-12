<?php
require('../../models/m_usuario/m_sesion.php');
require('../../config/connect.php');

if(isset($_POST['lago']) && $_POST['lago']!="" &&
   isset($_POST['siembra']) && $_POST['siembra']!="" &&
   isset($_POST['cantidad']) && $_POST['cantidad']!="" &&
   isset($_POST['descripcion']) && $_POST['descripcion']!="" &&
   isset($_POST['animal']) && $_POST['animal']!="" &&
   isset($_POST['promedioPeso']) && $_POST['promedioPeso']!="" &&
   isset($_POST['fecha']) && $_POST['fecha']!=""
){

    $codigo = $_GET['codigo'];

    $lago = $_POST['lago'];
    $viene = $_POST['lag'];
    $siembra = $_POST['siembra'];
    $cantidad = $_POST['cantidad'];
    $descripcion = $_POST['descripcion'];
    $animal = $_POST['animal'];
    $promedioPeso = $_POST['promedioPeso'];
    $saldo = $cantidad;
    $fecha = $_POST['fecha'];
    
    //Calculo mortandad

    //...........................................
    $entraron = $_POST['entraron'];
    $diferencia = $entraron - $cantidad;
    $mortandad = ($diferencia*100)/$entraron;
    //...........................................

    $codigo = mysqli_real_escape_string($con,$codigo);
    $lago = mysqli_real_escape_string($con,$lago);
    $siembra = mysqli_real_escape_string($con,$siembra);
    $cantidad = mysqli_real_escape_string($con,$cantidad);
    $descripcion = mysqli_real_escape_string($con,$descripcion);
    $animal = mysqli_real_escape_string($con,$animal);
    $promedioPeso = mysqli_real_escape_string($con,$promedioPeso);
    $saldo = mysqli_real_escape_string($con,$saldo);
    $mortandad = mysqli_real_escape_string($con,$mortandad);
    $fecha = mysqli_real_escape_string($con,$fecha);
  
    $sql = "UPDATE salida SET
      lago = '".$lago."',
      siembra = '".$siembra."',
      cantidad = '".$cantidad."',
      descripcion = '".$descripcion."',
      animal = '".$animal."',
      promedioPeso = '".$promedioPeso."',
      saldo = '".$saldo."',
      mortandad = '".$mortandad."',
      fecha = '".$fecha."'
      WHERE codigo = '".$codigo."'
    ";

$sqlSalida = "SELECT *FROM salida WHERE lago='".$lago."' AND siembra='".$siembra."'";
$querySalida = mysqli_query($con,$sqlSalida);

foreach($querySalida as $rw){}

if(!($rw['codigo']==$codigo || $rw['codigo']==null)){
     echo 'El lago que quiere usar ya está ocupado en ésta siembra';
}else{

  $validar = "SELECT *FROM alevinaje WHERE lago='".$viene."' AND siembra='".$siembra."'";
  $qrValidar = mysqli_query($con,$validar);
  
  foreach($qrValidar as $rwValidar){}
  
  
    if($rw['estado']=='ACTIVO'){
          
         //Se le suma al saldo lo que se le había quitado
          $suma = $rwValidar['saldo'] + $rw['cantidad'];
         
        
          if($suma<$cantidad){
              echo 'La cantidad a ingresar es mayor al saldo disponible';
          }else{
            //Se le resta al saldo 'suma' la cantidad a restar y
            //se verifica que no sea mayor al saldo disponible
            $resta = $suma - $cantidad;

                  $query = mysqli_query($con,$sql);

                        if(mysqli_error($con)!=null){
                            echo mysqli_error($con);
                            }else{

                                $sqlAlevinaje = "UPDATE alevinaje SET saldo='".$resta."' WHERE lago='".$viene."' AND siembra='".$siembra."'";
                                $queryAlevinaje = mysqli_query($con,$sqlAlevinaje);

                                header('LOCATION: ../../views/v_alevinaje/v_listarSalidas.php');
                            }

                }               

    }else{
        header('LOCATION: ../../views/v_alevinaje/v_lagoLiquidado.php');
        echo 'El lago que desea editar ya fue liquidado, no es posible editarlo';
    }
 

   }


}else{
    echo 'Hay campos vacios o no definidos';
}

?>