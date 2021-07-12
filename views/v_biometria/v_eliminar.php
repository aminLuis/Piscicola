<?php
require('../../models/m_usuario/m_sesion.php');
$codigo = $_GET['codigo'];
require('../../controllers/c_biometria/c_editar.php');
require('../../models/m_general/m_lagos.php');

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

                                <form method="POST" action="../../models/m_biometria/m_actualizar.php?codigo=<?php echo $row['codigo'] ?>">

                            <div class="row">

                                <div class="col">
                                    <label>Area</label>
                                    <input type="text" class="form-control" name="area" value="<?php echo $row['area'] ?>" required readonly>
                                </div>

                                <div class="col">
                                    <label>Lago</label>
                                
                                    <select class="form-control" name="lago" readonly>
                                    
                                    <option > <?php echo $row['lago'] ?> </option>

                                   
                                    
                                    </select>

                                </div>

                                <div class="col">
                                    <label>Animal</label>
                                            
                                        <select class="form-control" name="animal" readonly>  
                                            <?php 
                                                if($row['animal']=='Cachama'){
                                            ?>
                                            <option>Cachama</option>
                                            <?php 
                                                }else{
                                            ?>
                                            <option>Bocachico</option>
                                            <?php
                                                }
                                            ?>
                                        </select>  

                                </div>

                            </div>

                            <div class="row">

                                <div class="col">
                                    <label style="margin-top:23px">Promedio actual</label>
                                    <input type="number" step="any" class="form-control" name="promedio" value="<?php echo $row['promedio'] ?>" required readonly>
                                </div>

                                <div class="col">
                                    <label>Número de animales</label>
                                    <input type="number" class="form-control" name="cantidad" value="<?php echo $row['cantidad'] ?>" required readonly>
                                </div>

                                <div class="col">
                                    <label>Porcentaje de alimentación</label>
                                    <input type="number" step="any" class="form-control" name="porcentaje" value="<?php echo $row['porcentaje'] ?>" required readonly>
                                </div>

                            </div>

                            <div class="row">

                                <div class="col">
                                    <label>Ajuste</label>
                                    <input type="number" class="form-control" step="any" name="ajuste" value="<?php echo $row['ajuste'] ?>" required readonly>
                                </div>

                                <div class="col">
                                    <label>Tipo de alimento</label>
                                     <select name="alimento" class="form-control" readonly>
                                         <option> <?php echo $row['alimento'] ?> </option>
                                     </select>
                                </div>

                                <div class="col">
                                    <label>Kilos por día</label>
                                    <input type="number" class="form-control" step="any" name="kilosDia" value="<?php echo $row['kilosDia'] ?>" readonly>
                                </div>



                            </div>

                            <div class="row">

                                <div class="col">
                                    <label>Biomasa</label>
                                    <input type="number" class="form-control" step="any" name="biomasa" value="<?php echo $row['biomasa'] ?>" readonly>
                                </div>

                                
                                <div class="col">
                                    <label>Fecha</label>
                                    <input type="date" class="form-control" name="fecha" value="<?php echo $row['fecha'] ?>" required readonly>
                                </div>


                            </div>

                            </form>
                            <hr>

                            <p>El registro será eliminado permanentemente.</p>
                            <p>¿Desea continuar con la acción?</p>

                            <hr>
      </div>
      <div class="modal-footer">
      <a href="../../views/v_biometria/v_muestreo.php">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
      </a>
      
      <a href="../../models/m_biometria/m_eliminar.php?codigo=<?php echo $row['codigo'] ?>">
        <button type="button" class="btn btn-success">Continuar</button>
      </a>  
      </div>
    </div>
  </div>



<script src="../../assets/jquery/jquery-3.5.1.min.js"></script>
<script src="../../assets/bootstrap/js/bootstrap.min.js"></script> 

</body>
</html>