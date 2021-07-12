<?php
require('../../models/m_usuario/m_sesion.php');
require('../../config/connect.php');

if(isset($_POST['nombre']) && $_POST['nombre']!="" &&
   isset($_POST['direccion']) && $_POST['direccion']!="" &&
   isset($_POST['email']) && $_POST['email']!="" &&
   isset($_POST['telefono']) && $_POST['telefono']!="" &&
   isset($_POST['nit']) && $_POST['nit']!=""
){

 $nombre = $_POST['nombre'];
 $direccion = $_POST['direccion'];
 $email = $_POST['email'];
 $telefono = $_POST['telefono'];
 $nit = $_POST['nit'];

 $nombre = mysqli_real_escape_string($con,$nombre);
 $direccion = mysqli_real_escape_string($con,$direccion);
 $email = mysqli_real_escape_string($con,$email);
 $telefono = mysqli_real_escape_string($con,$telefono);
 $nit = mysqli_real_escape_string($con,$nit);

 $sqlEmpresa = "SELECT *FROM empresa";
 $queryEmpresa = mysqli_query($con,$sqlEmpresa);
 $cont = 0;
 foreach($queryEmpresa as $row){
     $cont++;
 }


 if($cont>0){
     echo 'Los datos de la empresa ya fueron registrados';
        }else{

        $sql = "INSERT INTO EMPRESA(
            nombre,
            direccion,
            email,
            telefono,
            nit
        ) VALUES(
            '$nombre',
            '$direccion',
            '$email',
            '$telefono',
            '$nit'
        )";

            $query = mysqli_query($con,$sql);

            if(mysqli_error($con)){
                echo mysqli_error($con);
            }else{
                header('LOCATION: ../../views/v_admin/v_configuracion.php');
            }

}



}else{
    echo 'Hay campos vacios o no definidos';
}


?>