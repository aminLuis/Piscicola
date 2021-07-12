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

    <title>Editar registro</title>
</head>
<body>
    
     <div class="edit">
         <div class="container">
         <h5>Datos actuales</h5>
                  <form method="POST" action="../../models/m_levante/m_actualizar.php?codigo=<?php echo $row['codigo'] ?>">
                      <div class="row">
                          <div class="col">
                              <label>Lago</label>
                              <select name="lago" class="form-control" readonly>
                                  <option> <?php echo $row['lago'] ?> </option>
                                  
                              </select>
                          </div>

                           <div class="col">
                             <label>Siembra</label>
                             <select name="siembra" class="form-control" required>
                              <option> <?php echo $row['siembra'] ?> </option>
                              <?php
                                foreach($siembras as $siembra){
                                    if($siembra!=$row['siembra']){
                              ?>
                                <option> <?php echo $siembra ?> </option>
                              <?php
                                    }
                                }
                              ?>
                             </select>
                           </div>

                          <div class="col">
                            <label>Unidades</label>
                            <input type="number" class="form-control" name="unidades" value="<?php echo $row['unidades'] ?>" required>
                          </div>
                          
                      </div>
                      <div class="row">

                              <div class="col">
                                <label>Kilogramos</label>
                                <input type="number" step="any" class="form-control" name="kilogramos" value="<?php echo $row['kilogramos'] ?>" required>
                              </div>
                          

                              <div class="col">
                               <label>Peso promedio (Kg)</label>
                               <input type="number" step="any" class="form-control" name="promedio" value="<?php echo $row['promedio'] ?>" required>   
                              </div>
                              <div class="col">
                                  <label>Número ficha pesaje</label>
                                  <input type="number" class="form-control" name="numero" value="<?php echo $row['numero'] ?>" required>
                              </div>
                             
                              
                             
                      </div>

                      <div class="row">

                           <div class="col">
                              <label>Precio kilo</label>
                              <input type="number" step="any" name="precio" class="form-control" value="<?php echo $row['precio'] ?>" required>
                            </div>

                           <div class="col">
                                <label>Fecha</label>
                                <input type="date" class="form-control" name="fecha" value="<?php echo $row['fecha'] ?>" required>
                            </div>
     
                            <div class="col"></div>

                     </div>

                            <button class="btn btn-primary" style="margin-top:30px">Guardar cambios</button>

                  </form>
                  <a href="./v_guardar.php">
                      <button class="btn btn-danger" style="width:147px">Cancelar</button>
                  </a>
         </div>
     </div>


    <script src="../../assets/jquery/jquery-3.5.1.min.js"></script>
    <script src="../../assets/bootstrap/js/bootstrap.min.js"></script> 

</body>
</html>