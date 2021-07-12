<?php
require('../../models/m_usuario/m_sesion.php');
require('../../config/connect.php');

if(isset($_POST['lago']) && $_POST['lago']!="" &&
   isset($_POST['siembra']) && $_POST['siembra']!=""
){

  $lago = $_POST['lago'];
  $siembra = $_POST['siembra'];   
  $salida = 'SALIO';

  $lago = mysqli_real_escape_string($con,$lago);
  $siembra = mysqli_real_escape_string($con,$siembra);
  $salida = mysqli_real_escape_string($con,$salida);

  $sql = "UPDATE alevinaje SET salida='".$salida."' WHERE lago='".$lago."' AND siembra='".$siembra."'";
  $query = mysqli_query($con,$sql);

  if(mysqli_error($con)){
      echo mysqli_error($con);
  }else{
      header('LOCATION: ../../views/v_alevinaje/v_guardar.php');
  }

}else{

    echo 'Hay campos vacios o no definidos';
}

?>