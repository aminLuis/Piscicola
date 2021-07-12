<?php
require('../../models/m_usuario/m_sesion.php');
require('../../models/m_general/m_noAutorizado.php');
require('../../controllers/c_admin/c_cargarCostoFijo.php');
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

        <div class="row">

                            <div class="col">
                            <label>Siembra</label>
                            <select name="siembra" class="form-control" readonly>
                                <option> <?php echo $row['siembra'] ?> </option>
                            </select>
                            </div>

                            <div class="col">
                                <label>Nomina fija</label>
                                <input type="number" class="form-control" step="any" name="nomina" value="<?php echo $row['nomina'] ?>" readonly>
                            </div>

                            <div class="col">
                                <label>Asistencia técnica</label>
                                <input type="number" class="form-control" step="any" name="asistencia" value="<?php echo $row['asistencia'] ?>" readonly>
                            </div>

                            </div>

                            <div class="row">

                            <div class="col">
                            <label>Jornales muestras</label>
                            <input type="number" class="form-control" step="any" name="jornales" value="<?php echo $row['jornales'] ?>" readonly>
                            </div>

                            <div class="col">
                            <label>Combustible</label>
                            <input type="number" class="form-control" step="any" name="combustible" value="<?php echo $row['combustible'] ?>" readonly>
                            </div>

                            <div class="col">
                            <label>Tiros</label>
                            <input type="number" class="form-control" step="any" name="tiros" value="<?php echo $row['tiros'] ?>" readonly>
                            </div>

                            </div>

                            <div class="row">

                            <div class="col">
                            <label>Energia</label>
                            <input type="number" class="form-control" step="any" name="energia" value="<?php echo $row['energia'] ?>" readonly>
                            </div>

                            <div class="col">
                            <label>Fecha</label>
                                <input type="date" class="form-control" name="fecha" value="<?php echo $row['fecha'] ?>" readonly>
                            </div>

                            <div class="col"></div>

                            </div>


          <hr>
        <p>El registro será eliminado permanentemente</p>
        <p>¿Desea continuar con la acción?</p>
      </div>
      <div class="modal-footer">
      
      <a href="./v_costoSiembra.php">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
      </a>   

      <a href="../../models/m_admin/m_eliminarCostoFijo.php?codigo=<?php echo $row['codigo'] ?>">
        <button type="button" class="btn btn-success">Continuar</button>
      </a>
      
      </div>
    </div>
  </div>

 


    <script src="../../assets/jquery/jquery-3.5.1.min.js"></script>
    <script src="../../assets/bootstrap/js/bootstrap.min.js"></script>

</body>
</html>