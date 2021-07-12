<?php
//require('../../models/m_usuario/m_sesion.php');
require('../../config/connect.php');

if(isset($_POST['user']) && $_POST['user']!="" &&
   isset($_POST['password']) && $_POST['password']!=""
){

$user = $_POST['user'];
$password = $_POST['password'];

$user = mysqli_real_escape_string($con,$user);
$password = mysqli_real_escape_string($con,$password);

$sql = "SELECT *FROM usuario WHERE user='".$user."'";
$query = mysqli_query($con,$sql);


if($query){

        foreach($query as $row){}

        if(password_verify($password,$row['passwd'])){
            session_start();
            $_SESSION['usuario'] = $row;
            if($row['tipo']=='admin' || $row['tipo']=='root'){
            header('LOCATION: ../../views/v_admin/home.php');
            }else{
                header('LOCATION: ../../views/v_userFinal/home.php');
            }
        }else{
            if($password==$row['passwd']){
                session_start();
                $_SESSION['usuario'] = $row;
                if($row['tipo']=='admin' || $row['tipo']=='root'){
                header('LOCATION: ../../views/v_admin/home.php');
                }else{
                    header('LOCATION: ../../views/v_userFinal/home.php');
                }
            }else{
                echo 'Contraseña incorrecta';
                header('LOCATION: ../../views/v_general/v_passIncorrecto.php');
            }
        }

}else{
    echo 'Usuario o contraseña incorrecta';
    header('LOCATION: ../../views/v_general/v_passIncorrecto.php');
}


}else{
    echo 'Hay campos vacios o no definidos';
}

?>