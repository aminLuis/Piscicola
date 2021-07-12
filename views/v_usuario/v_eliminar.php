<?php
require('../../models/m_usuario/m_sesion.php');
require('../../models/m_general/m_noAutorizado.php');
$user = $_GET['user'];
require('../../controllers/c_usuario/c_cargarUsuario.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="Stylesheet" href="../../assets/bootstrap/css/bootstrap.min.css">
    <link rel="Stylesheet" href="../../assets/styles/admin.css">
    <link rel="Stylesheet" href="../../assets/styles/alevinaje.css">

    <title>Eliminar registro</title>
</head>
<body>
    
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h5 class="modal-title text-light">Advertencia</h5>
      
      </div>
      <div class="modal-body">

      <div class="row">
                           <div class="col">
                               <label>Nombre</label>
                               <input type="text" class="form-control" name="nombre" value="<?php echo $row['nombre'] ?>" readonly>
                           </div>
                           <div class="col">
                               <label>Primer apellido</label>
                               <input type="text" class="form-control" name="primerApe" value="<?php echo $row['primerApe'] ?>" readonly>
                           </div>
                           <div class="col">
                                <label>Segundo apellido</label>
                                <input type="text" class="form-control" name="segundoApe" value="<?php echo $row['segundoApe'] ?>" readonly>
                           </div>
                       </div>

                       <div class="row">
                             <div class="col">
                                <label>Dirección</label>
                                <input type="text" class="form-control" name="direccion" value="<?php echo $row['direccion'] ?>" readonly>
                             </div>
                             <div class="col">
                                <label>Télefono</label>
                                <input type="text" class="form-control" name="telefono" value="<?php echo $row['telefono'] ?>" readonly>
                             </div>
                             <div class="col">
                             </div>
                       </div>
                      

             
        <hr>
        <p>El registro será eliminado permanentemente.</p>
        <p>¿Desea continuar con la acción?</p>
        <hr>
      </div>
      <div class="modal-footer">
      <a href="./v_crearUsuario.php">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
      </a>

        <a href="../../models/m_usuario/m_eliminar.php?user=<?php echo $row['user'] ?>">
         <button type="button" class="btn btn-success">Continuar</button>
        </a>
      
      </div>
    </div>
  </div>


<script src="../../assets/jquery/jquery-3.5.1.min.js"></script>
<script src="../../assets/bootstrap/js/bootstrap.min.js"></script> 

</body>
</html>