<?php
require('../../models/m_usuario/m_sesion.php');
require('../../models/m_general/m_noAutorizado.php');
$codigo = $_GET['codigo'];
require('../../controllers/c_admin/c_cargarSiembra.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="Stylesheet" href="../../assets/bootstrap/css/bootstrap.min.css">
    <link rel="Stylesheet" href="../../assets/styles/admin.css">

    <title>Eliminar registro</title>
</head>
<body>
    
     

  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h5 class="modal-title text-light">Advertencia</h5>
        
      </div>
      <div class="modal-body">
     
                  <form method="POST" action="../../models/m_admin/m_siembras.php">
                       <h5>Crear siembra</h5>

                            <div class="row">
                                <div class="col">
                                <label>Ingrese siembra</label>
                                <input type="text" class="form-control" name="siembra" value="<?php echo $row['siembra'] ?>" readonly>
                                </div>
                                <div class="col">
                                 <label>Fecha creación</label>
                                <input type="date" class="form-control" name="fecha" value="<?php echo $row['fecha'] ?>" readonly>
                                </div>
                            </div>
                   </form>


        <hr>
        <p>El registro será eliminado permanentemente</p>
        <p>¿Desea continuar con la acción?</p>
        <hr>
      </div>
      <div class="modal-footer">
         <a href="./v_configuracion.php"> 
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        </a>
        <a href="../../models/m_admin/m_eliminarSiembra.php?codigo=<?php echo $row['codigo'] ?>">
           <button type="button" class="btn btn-success">Continuar</button>
        </a>
      </div>
    </div>
  </div>


    <script src="../../assets/jquery/jquery-3.5.1.min.js"></script>  
    <script src="../../assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>