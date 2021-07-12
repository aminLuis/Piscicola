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

    <title>Editar usuario</title>
</head>
<body>
    
    <div class="edit">
    
       <h5>Datos actuales</h5>
      
            <div class="container">
   
                <form method="POST" action="../../models/m_usuario/m_actualizar.php?user=<?php echo $row['user'] ?>">
               
                       <div class="row">
                           <div class="col">
                               <label>Nombre</label>
                               <input type="text" class="form-control" name="nombre" value="<?php echo $row['nombre'] ?>" required>
                           </div>
                           <div class="col">
                               <label>Primer apellido</label>
                               <input type="text" class="form-control" name="primerApe" value="<?php echo $row['primerApe'] ?>" required>
                           </div>
                           <div class="col">
                                <label>Segundo apellido</label>
                                <input type="text" class="form-control" name="segundoApe" value="<?php echo $row['segundoApe'] ?>" required>
                           </div>
                       </div>

                       <div class="row">
                             <div class="col">
                                <label>Dirección</label>
                                <input type="text" class="form-control" name="direccion" value="<?php echo $row['direccion'] ?>" required>
                             </div>
                             <div class="col">
                                <label>Télefono</label>
                                <input type="text" class="form-control" name="telefono" value="<?php echo $row['telefono'] ?>" required>
                             </div>
                             <div class="col">
                             </div>
                       </div>
                      
                       
                       <hr>
                       <button type="submit" class="btn btn-primary">Guardar cambios</button>

                </form>
                   <a href="./v_crearUsuario.php">
                     <button class="btn btn-danger" style="width:147px">Cancelar</button>
                   </a>
            </div>

    </div>

<script src="../../assets/jquery/jquery-3.5.1.min.js"></script>
<script src="../../assets/bootstrap/js/bootstrap.min.js"></script> 

</body>
</html>