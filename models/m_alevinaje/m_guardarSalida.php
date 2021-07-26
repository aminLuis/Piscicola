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

$lago = $_POST['lago'];
$viene = $_POST['lag'];
$siemb = $_POST['siemb'];
$siembra = $_POST['siembra'];
$cantidad = $_POST['cantidad'];
$descripcion = $_POST['descripcion'];
$animal = $_POST['animal'];
$promedioPeso = $_POST['promedioPeso'];
$saldo = $cantidad;
$estado = 'ACTIVO';
$fecha = $_POST['fecha'];


//Calculo mortandad

//...........................................
$entraron = $_POST['entraron'];
$diferencia = $entraron - $cantidad;
$mortandad = ($diferencia*100)/$entraron;
//...........................................

$sal = 'SALIO'; 

$lago = mysqli_real_escape_string($con,$lago);
$viene = mysqli_real_escape_string($con,$viene);
$siembra = mysqli_real_escape_string($con,$siembra);
$cantidad = mysqli_real_escape_string($con,$cantidad);
$entraron = mysqli_real_escape_string($con,$entraron);
$descripcion = mysqli_real_escape_string($con,$descripcion);
$animal = mysqli_real_escape_string($con,$animal);
$promedioPeso = mysqli_real_escape_string($con,$promedioPeso);
$saldo = mysqli_real_escape_string($con,$saldo);
$mortandad = mysqli_real_escape_string($con,$mortandad);
$fecha = mysqli_real_escape_string($con,$fecha);
$estado = mysqli_real_escape_string($con,$estado);
$sal = mysqli_real_escape_string($con,$sal);


$sql = "INSERT INTO salida(
    lago,
    viene,
    siembra,
    cantidad,
    entraron,
    descripcion,
    animal,
    promedioPeso,
    saldo,
    mortandad,
    estado,
    fecha
) 
VALUES(
    '$lago',
    '$viene',
    '$siembra',
    '$cantidad',
    '$entraron',
    '$descripcion',
    '$animal',
    '$promedioPeso',
    '$saldo',
    '$mortandad',
    '$estado',
    '$fecha'
)";


$validar = "SELECT *FROM alevinaje WHERE lago='".$viene."' AND siembra='".$siemb."'";
$qrValidar = mysqli_query($con,$validar);

foreach($qrValidar as $rwValidar){}


$sqlRegistroSalida = "INSERT INTO registroSalida(
    codigo,
    lago,
    siembra,
    lagoEngorde,
    cantidad,
    descripcion,
    animal,
    fecha
)
VALUES(
   '".$rwValidar['codigo']."',
   '".$rwValidar['lago']."',
   '".$rwValidar['siembra']."',
   '$lago',
   '$cantidad',
   '$descripcion',
   '$animal',
   '".$rwValidar['fecha']."' 
)";




$sqlSalida = "SELECT *FROM salida WHERE lago='".$lago."' AND siembra='".$siembra."'";
$querySalida = mysqli_query($con,$sqlSalida);

foreach($querySalida as $rw){}



if($rw['codigo']!=null && $rw['animal']==$animal){


     //echo 'El lago que quiere usar ya está ocupado en ésta siembra';
    // header('LOCATION: ../../views/v_alevinaje/v_lagoOcupado.php');


         if($rwValidar['saldo']<$cantidad){
            echo 'La cantida a sacar del lago es mayor a la disponible';
         }else{
            
                $nuevaCantidad = $rw['cantidad'] + $cantidad;
                $nuevoSaldo = $rw['saldo'] + $cantidad;

                $SQLactualizarSalida = "UPDATE salida SET cantidad='".$nuevaCantidad."', saldo='".$nuevoSaldo."' WHERE codigo='".$rw['codigo']."'";
                $queryActualizarSalida = mysqli_query($con,$SQLactualizarSalida);

                $queryRegistroSalida = mysqli_query($con,$sqlRegistroSalida);

                $resta = $rwValidar['saldo'] - $cantidad;

                $sqlAlevinaje = "UPDATE alevinaje SET saldo='".$resta."' WHERE lago='".$viene."' AND siembra='".$siemb."'";
                $queryAlevinaje = mysqli_query($con,$sqlAlevinaje);

                header('LOCATION: ../../views/v_alevinaje/v_guardar.php');
              
               
         }


}else{
 
  
  if($rwValidar['salida']=='SALIO'){
      echo 'El lago ya fue liquidado';
      header('LOCATION: ../../views/v_alevinaje/v_salioAlevinos.php');
  }else{

      if($rwValidar['saldo']<$cantidad){
          echo 'La cantida a sacar del lago es mayor a la disponible';
      }else{



                $query = mysqli_query($con,$sql);

                if(mysqli_error($con)!=null){
                    echo mysqli_error($con);
                    }else{

                        $resta = $rwValidar['saldo'] - $cantidad;

                        $sqlAlevinaje = "UPDATE alevinaje SET saldo='".$resta."' WHERE lago='".$viene."' AND siembra='".$siemb."'";
                        $queryAlevinaje = mysqli_query($con,$sqlAlevinaje);

                        $queryRegistroSalida = mysqli_query($con,$sqlRegistroSalida);

                        header('LOCATION: ../../views/v_alevinaje/v_guardar.php');
                    }

                }
       }

   }

}else{
    echo 'Hay campos vacios o no defidos';
}

?>