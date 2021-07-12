<?php
require('../../models/m_usuario/m_sesion.php');
$codigo = $_GET['codigo'];
require('../../models/m_alevinaje/m_editar.php');
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
    <link rel="Stylesheet" href="../../assets/styles/alevinaje.css">
    <link rel="Stylesheet" href="../../assets/jquery/jquery.dataTables.min.css">

    <title>Editar registro</title>
</head>
<body>
    
   <div class="edit">

    <h5>Datos actuales</h5>

     <div class="container">
  
                        <form method="POST" action="../../models/m_alevinaje/m_actualizar.php?codigo=<?php echo $row['codigo'] ?>">
                              
                              <div class="row">
                                  <div class="col">
                                  <label>Labor</label>
                                  <input type="text" class="form-control" name="labor" value="Entra a lago" readonly>
                                  </div>
                                  <div class="col">
                                  <label>Descripción</label>
                                  <input type="text" class="form-control" name="descripcion" required value="<?php echo $row['descripcion'] ?>">
                                  </div>
                            
                                  <div class="col">
                                  <label>Lago</label>
                                   
                                   <select name="lago" class="form-control" required>
                                     <option> <?php echo $row['lago'] ?> </option>

                                       <?php 
                                         foreach($lagos as $lago){
                                             if($row['lago']!=$lago){
                                       ?>

                                            <option> <?php echo $lago ?> </option>

                                        <?php
                                             }
                                         }
                                        ?>

                                   </select>
                                   
                                  </div>
                            
                            </div>
                              <div class="row">
                                  <div class="col">
                                  <label>Animal</label>

                                  <?php 
                                  if($row['animal']=='Cachama'){
                                  ?>
                                  <select class="form-control" name="animal">
                                      <option>Cachama</option>
                                      <option>Bocachico</option>
                                  </select>

                                   <?php
                                  }else{
                                   ?>

                                  <select class="form-control" name="animal">
                                      <option>Bocachico</option>
                                      <option>Cachama</option>
                                  </select>

                                   <?php
                                  }
                                   ?>

                                  </div>
                                  <div class="col">
                                  <label>Peso promedio</label>
                                  <input type="number" step="any" class="form-control" name="pesoPromedio" required value="<?php echo $row['pesoPromedio'] ?>">
                                  </div>
                                  <div class="col">
                                  <label>Número de alevinos</label>
                                  <input type="number" class="form-control" name="cantidad" required value="<?php echo $row['cantidad'] ?>">
                                  </div>
                              </div>

                              <div class="row">
                                  
                              <div class="col">
                            
                                  <label>Siembra</label>
                                  <select name="siembra" class="form-control" required>
                                      <option> <?php echo $row['siembra'] ?> </option>
                                      <?php
                                       foreach($siembras as $siembra){
                                           if($row['siembra']!=$siembra){
                                      ?>
                                             <option> <?php echo $siembra ?> </option>
                                      <?php
                                           }
                                       }
                                      ?>
                                  </select>

                             </div>
                                  <div class="col">
                                  <label>fecha</label>
                                  <input type="date" class="form-control" name="fecha" required value="<?php echo $row['fecha']?>">
                                  </div>
                                  <div class="col">
                                  <textarea class="textarea" name="nota"> <?php echo $row['nota'] ?> </textarea>
                                  </div>
                              </div>

                              <button type="submit" class="btn btn-primary">Guardar cambios</button>
                              
                      </form>

                    <a href="../../views/v_alevinaje/v_guardar.php">
                      <button class="btn btn-danger btn-cancel">Cancelar</button>
                    </a>

     </div>
    
   </div>
   
</body>
</html>