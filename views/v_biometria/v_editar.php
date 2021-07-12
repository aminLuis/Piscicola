<?php
require('../../models/m_usuario/m_sesion.php');
$codigo = $_GET['codigo'];
require('../../controllers/c_biometria/c_editar.php');
require('../../models/m_general/m_lagos.php');
require('../../models/m_general/m_listarSiembras.php');
require('../../models/m_general/m_alimentos.php');

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

             <form method="POST" action="../../models/m_biometria/m_actualizar.php?codigo=<?php echo $row['codigo'] ?>">

                <div class="row">


                    <div class="col">
                        <label>Lago</label>
                       
                        <select class="form-control" name="lago">
                        
                           <option > <?php echo $row['lago'] ?> </option>

                           <?php 
                             foreach($lagos as $lago){
                                 if($lago!=$row['lago']){
                           ?>

                           <option> <?php echo $lago ?> </option>

                           <?php 
                                 }
                                }  
                           ?>
                        
                        </select>

                    </div>

                    <div class="col">
                        <label>Animal</label>
                                
                              <select class="form-control" name="animal">  
                                <?php 
                                    if($row['animal']=='Cachama'){
                                ?>
                                <option>Cachama</option>
                                <option>Bocachico</option>
                                <?php 
                                    }else{
                                ?>
                                <option>Bocachico</option>
                                <option>Cachama</option>
                                <?php
                                    }
                                ?>
                              </select>  

                    </div>

                    <div class="col">
                        <label>Promedio actual (Gr)</label>
                        <input type="number" step="any" class="form-control" name="promedio" value="<?php echo $row['promedio'] ?>" required>
                    </div>


                </div>

                <div class="row">

                    

                    <div class="col">

                                <label>Siembra</label>
                                <select name="siembra" class="form-control">
                                   <option> <?php echo $row['siembra'] ?> </option>
                                    <?php
                                    foreach($siembras as $siemb){
                                        if($row['siembra']!=$siemb){
                                    ?>
                                      
                                      <option> <?php echo $siemb ?> </option>

                                    <?php
                                        }    
                                      }
                                    ?>
                                </select>

                    </div>


                    <div class="col">
                        <label>Número de animales</label>
                        <input type="number" class="form-control" name="cantidad" value="<?php echo $row['cantidad'] ?>" required>
                    </div>

                    <div class="col">
                        <label>Porcentaje de alimentación (%)</label>
                        <input type="number" step="any" class="form-control" name="porcentaje" value="<?php echo $row['porcentaje'] ?>" required>
                    </div>

                </div>

                <div class="row">

                   

                     <div class="col">
                        <label>Ajuste</label>
                        <input type="number" class="form-control" step="any" name="ajuste" value="<?php echo $row['ajuste'] ?>" required>
                     </div>

                     <div class="col">
                        <label>Tipo de alimento</label>
                      
                          <select name="alimento" class="form-control">
                              <option> <?php echo $row['alimento'] ?> </option>
                              <?php
                              foreach($alimentos as $alimento){
                              ?>
                                  <option> <?php echo $alimento ?> </option>
                              <?php
                              }
                              ?>
                          </select>
                         

                    </div>

                    <div class="col">
                        <label>Kilos por día</label>
                        <input type="number" class="form-control" step="any" name="kilosDia" value="<?php echo $row['kilosDia'] ?>" readonly>
                     </div>

 
                </div>

                <div class="row">


                      <div class="col">
                         <label>Biomasa (Kg)</label>
                         <input type="number" class="form-control" step="any" name="biomasa" value="<?php echo $row['biomasa'] ?>" readonly>
                      </div>

                      
                     <div class="col">
                        <label>Fecha</label>
                        <input type="date" class="form-control" name="fecha" value="<?php echo $row['fecha'] ?>" required>
                     </div>

                     <div class="col"></div>

                </div>
             
                  <button class="btn btn-primary" style="margin-top: 30px">Guardar cambios</button>

             </form>
                  <a href="../../views/v_biometria/v_muestreo.php">
                     <button class="btn btn-danger" style="width:145px">Cancelar</button>
                  </a>

        </div>

</div>
    
</body>
</html>