<?php
require('../../models/m_usuario/m_sesion.php');
$codigo = $_GET['codigo'];
require('../../controllers/c_bitacora/c_cargarBitacora.php');
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
        <h5 class="modal-title text-white">Advertencia</h5>
       
      </div>
      <div class="modal-body">

          <div class="row">
                <div class="col">
                    <label>Autor</label>
                    <input type="text" class="form-control" value="<?php echo $row['autor'] ?>" readonly>
                </div>
                <div class="col">
                    <label>Asunto</label>
                    <input type="text" class="form-control" value="<?php echo $row['asunto'] ?>" readonly>
                </div>
                
          </div>
          <div class="row">
                <div class="col">
                    <label>Fecha</label>
                    <input type="text" class="form-control" value="<?php echo $row['fecha'] ?>" readonly>
                </div>
                <div class="col">
                    <label>Hora</label>
                    <input type="text" class="form-control" value="<?php echo $row['hora'] ?>" readonly>
                </div>
          </div>
        <hr>
        <p>El registro será eliminado permanentemente.</p>
        <p>¿Desea continuar con la acción?</p>
        <hr>

      </div>
      <div class="modal-footer">
      
        <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="history.go(-1)">Cancelar</button>
      
      <a href="../../models/m_bitacora/m_eliminar.php?codigo=<?php echo $row['codigo'] ?>">
        <button type="button" class="btn btn-success">Continuar</button>
      </a>
      
      </div>
    </div>
  </div>



</body>
</html>