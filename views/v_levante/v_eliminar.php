<?php
require('../../models/m_usuario/m_sesion.php');
$codigo = $_GET['codigo'];
require('../../controllers/c_levante/c_cargarLevante.php');
require('../../models/m_general/m_lagos.php');
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
    <link rel="Stylesheet" href="../../assets/icons/css/all.min.css">

    <title>Eliminar registro</title>
</head>
<body>



  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h5 class="modal-title text-light">Advertencia</h5>
        
        </button>
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
                             <select name="siembra" class="form-control" readonly>
                              <option> <?php echo $row['siembra'] ?> </option>
                              
                             </select>
                           </div>

                          <div class="col">
                            <label>Unidades</label>
                            <input type="number" class="form-control" name="unidades" value="<?php echo $row['unidades'] ?>" readonly>
                          </div>
                          
                      </div>
                      <div class="row">

                              <div class="col">
                                <label>Kilogramos</label>
                                <input type="number" step="any" class="form-control" name="kilogramos" value="<?php echo $row['kilogramos'] ?>" readonly>
                              </div>
                          

                              <div class="col">
                               <label>Peso promedio (Kg)</label>
                               <input type="number" step="any" class="form-control" name="promedio" value="<?php echo $row['promedio'] ?>" readonly>   
                              </div>
                              <div class="col">
                                  <label>Número ficha pesaje</label>
                                  <input type="number" class="form-control" name="numero" value="<?php echo $row['numero'] ?>" readonly>
                              </div>
                             
                              
                             
                      </div>

                      <div class="row">

                           <div class="col">
                              <label>Precio kilo</label>
                              <input type="number" step="any" name="precio" class="form-control" value="<?php echo $row['precio'] ?>" readonly>
                            </div>

                           <div class="col">
                                <label>Fecha</label>
                                <input type="date" class="form-control" name="fecha" value="<?php echo $row['fecha'] ?>" readonly>
                            </div>
     
                            <div class="col"></div>

                     </div>

            <hr>

        <p>El registro será eliminado permanentemente.</p>
        <p>¿Desea continuar con la acción?</p>
        <hr>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="history.go(-1)">Cancelar</button>

        <a href="../../models/m_levante/m_eliminar.php?codigo=<?php echo $row['codigo'] ?>">
         <button type="button" class="btn btn-success">Continuar</button>
        </a>
    </div>
    </div>
  </div>

  
    

    <script src="../../assets/jquery/jquery-3.5.1.min.js"></script>
    <script src="../../assets/bootstrap/js/bootstrap.min.js"></script> 

</body>
</html>