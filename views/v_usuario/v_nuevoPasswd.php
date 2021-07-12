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

    <title>Document</title>
</head>
<body>
    

  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-warning">
        <h5 class="modal-title">Nueva contraseña</h5>
       
      </div>
      <div class="modal-body">

                <form method="POST" action="../../models/m_usuario/m_nuevoPasswd.php">
                
                    <div class="row">
                        <div class="col">
                           <label>Usuario</label>
                           <input type="text" class="form-control" name="user" value="<?php echo $row['user'] ?>" readonly>
                        </div>
                        <div class="col">
                           <label>Nombre</label>
                           <input type="text" class="form-control" value="<?php echo $row['nombre'] ?>" readonly>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col">
                           <label>Ingrese nueva contraseña</label>
                           <input type="password" class="form-control" name="passwd" required>
                        </div>
                    </div>

                    <button class="btn btn-success" style="margin-top:20px">Guardar nueva</button>

                </form>

      
      </div>
      <div class="modal-footer">
        
        <a href="./v_crearUsuario.php">
           <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        </a>
         
      </div>
    </div>
  </div>


<script src="../../assets/jquery/jquery-3.5.1.min.js"></script>
<script src="../../assets/bootstrap/js/bootstrap.min.js"></script> 

</body>
</html>