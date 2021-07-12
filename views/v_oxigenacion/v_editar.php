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
    <link rel="Stylesheet" href="../../assets/icons/css/all.min.css">

    <title>Editar registro</title>
</head>
<body>
    
      <div class="edit">
           <div class="container">

                 <h5>Datos actuales</h5>

                 <form method="POST" action="../../models/m_oxigenacion/m_actualizar.php?codigo=<?php echo $row['codigo'] ?>">
                  
                 <div class="row">
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
                             <div class="col">
                             <label>Siembra</label>
                                      <select name="siembra"  class="form-control" required>
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
                               <label>Oxigeno disuelto (OD)</label>
                               <input type="number" step="any" class="form-control" name="oxigeno" value="<?php echo $row['oxigeno'] ?>" required>
                             </div>
                        </div>

                        <div class="row">
                          <div class="col">
                               <label>Temperatura (°C)</label>
                               <input type="number" step="any" class="form-control" name="temperatura" value="<?php echo $row['temperatura'] ?>" required>
                          </div>
                          <div class="col">
                            <label>Fecha</label>
                            <input type="date" class="form-control" name="fecha" value="<?php echo $row['fecha'] ?>" required>
                          </div>
                          <div class="col"></div>
                        </div>
 
                         <button class="btn btn-primary" style="margin-top:30px">Guardar cambios</button>
                   
                 </form>

                 <button class="btn btn-danger" style="width:147px" onclick="history.go(-1)">Cancelar</button>
           </div>
      </div>

</body>
</html>