<?php
require('../../models/m_usuario/m_sesion.php');
$codigo = $_GET['codigo'];
require('../../models/m_alevinaje/m_editar.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="Stylesheet" href="../../assets/bootstrap/css/bootstrap.min.css">
    <link rel="Stylesheet" href="../../assets/styles/admin.css">
    <link rel="Stylesheet" href="../../assets/icons/css/all.min.css">

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
                                  <label>Labor</label>
                                  <?php
                                  
                                   if($row['labor']=='Entra a lago'){
                                  
                                  ?>
                                  <select class="form-control" name="labor" readonly>
                                      <option>Entra a lago</option>
                                      
                                  </select>

                                  <?php 
                                   }else{
                                  ?>
                                   <select class="form-control" name="labor" readonly>
                                      <option>Sale de lago</option>
                                      
                                  </select>

                                   <?php
                                   }
                                   ?>

                                  </div>
                                  <div class="col">
                                  <label>Descripción</label>
                                  <input type="text" class="form-control" name="descripcion" value="<?php echo $row['descripcion'] ?>"readonly>
                                  </div>
                                  <div class="col">
                                  <label>Lago</label>
                                  <select class="form-control" readonly>
                                    <option> <?php echo $row['lago'] ?> </option>
                                  </select>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col">
                                  <label>Animal</label>

                                  <?php 
                                  if($row['animal']=='Cachama'){
                                  ?>
                                  <select class="form-control" name="animal" readonly>
                                      <option>Cachama</option>
                                      
                                  </select>

                                   <?php
                                  }else{
                                   ?>

                                  <select class="form-control" name="animal" readonly>
                                      <option>Bocachico</option>
                                     
                                  </select>

                                   <?php
                                  }
                                   ?>

                                  </div>
                                  <div class="col">
                                  <label>Peso promedio</label>
                                  <input type="number" step="any" class="form-control" name="pesoPromedio" value="<?php echo $row['pesoPromedio'] ?>" readonly>
                                  </div>
                                  <div class="col">
                                  <label>Número alevinos</label>
                                  <input type="text" class="form-control" name="cantidad" value="<?php echo $row['cantidad'] ?>" readonly>
                                  </div>
                              </div>

                              <div class="row">
                                
                              <div class="col">
                                  <label>Siembra</label>
                                     <select class="form-control" readonly>
                                       <option> <?php echo $row['siembra'] ?> </option>
                                     </select>
                                  </div>
                              
                                  <div class="col">
                                  <label>fecha</label>
                                  <input type="date" class="form-control" name="fecha" value="<?php echo $row['fecha']?>" readonly>
                                  </div>
                                  <div class="col">
                                  <label>Nota</label>
                                  <textarea  name="nota" style="width:135px" readonly>
                                    <?php echo $row['nota'] ?>
                                  </textarea>
                                  </div>
                              </div>

                         
                              <hr>

                                    <p>El registro será eliminado permanentemente</p>
                                    <p>¿Desea continuar con la acción?</p>

                              <hr>               
       
      </div>
      <div class="modal-footer">
      <a href="../v_alevinaje/v_guardar.php">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
      </a>  

      <a href="../../models/m_alevinaje/m_eliminar.php?codigo=<?php echo $row['codigo'] ?>">
        <button type="button" class="btn btn-success">Continuar</button>
      </a>

      </div>
    </div>
  </div>


<script src="../../assets/jquery/jquery-3.5.1.min.js"></script>
<script src="../../assets/bootstrap/js/bootstrap.min.js"></script> 

</body>
</html>