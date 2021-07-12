<?php
require('../../models/m_usuario/m_sesion.php');
require('../../models/m_general/m_lagos.php');
$codigo = $_GET['codigo'];
require('../../controllers/c_oxigenacion/c_cargarOD.php');
require('../../models/m_general/m_listarSiembras.php');
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
                                 <label>Lago</label>
                                 <select name="lago" class="form-control" readonly>
                                        <option> <?php echo $row['lago'] ?> </option>
                                      </select>
                             </div>
                             <div class="col">
                             <label>Siembra</label>
                                      <select name="siembra"  class="form-control" readonly>
                                         <option> <?php echo $row['siembra'] ?> </option>
                                      </select>
                             </div>
                             <div class="col">
                               <label>OD</label>
                               <input type="number" step="any" class="form-control" name="oxigeno" value="<?php echo $row['oxigeno'] ?>" readonly>
                             </div>
                        </div>

                        <div class="row">
                          <div class="col">
                               <label>Temperatura (°C)</label>
                               <input type="number" step="any" class="form-control" name="temperatura" value="<?php echo $row['temperatura'] ?>" readonly>
                          </div>
                          <div class="col">
                            <label>Fecha</label>
                            <input type="date" class="form-control" name="fecha" value="<?php echo $row['fecha'] ?>" readonly>
                          </div>
                          <div class="col"></div>
                        </div>
 

        <hr>
        <p>El registro será eliminado de forma permanente</p>
        <p>¿Desea continuar con la acción?</p>
        <hr>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="history.go(-1)">Cancelar</button>
      
        <a href="../../models/m_oxigenacion/m_eliminar.php?codigo=<?php echo $row['codigo'] ?>">
          <button type="button" class="btn btn-success">Continuar</button>
        </a>
      
      </div>
    </div>
  </div>



</body>
</html>