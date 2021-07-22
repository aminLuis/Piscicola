<?php
require('../../models/m_usuario/m_sesion.php');
$codigo = $_GET['codigo'];
require('../../controllers/c_alevinaje/c_cargarSalida.php');
require('../../models/m_general/m_lagos.php');
require('../../models/m_general/m_listarSiembras.php');
require('../../controllers/c_alevinaje/c_buscarRegistro.php');


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="Stylesheet" href="../../assets/bootstrap/css/bootstrap.min.css">
    <link rel="Stylesheet" href="../../assets/styles/alevinaje.css">
    <link rel="Stylesheet" href="../../assets/icons/css/all.min.css">

    <title>Editar registro</title>
</head>
<body>
    
   <?php
      if($rowRegistro['codigo']==null){
      
   ?>


    <div class="edit">
         <div class="container">
            <h5>Datos actuales</h5>
          <br>
         <form method="POST" action="../../models/m_alevinaje/m_actualizarSalida.php?codigo=<?php echo $row['codigo'] ?>">
               
                <div class="row">
                
                        <div class="col">
                           <label>Número de alevinos a salir</label>
                           <input type="text" class="form-control" name="cantidad" value="<?php echo $row['cantidad'] ?>" required>
                       </div>

                       <div class="col">
                                    <label>Siembra</label>
                                    <select name="siembra"  class="form-control" readonly>
                                       <option> <?php echo $row['siembra'] ?> </option>
                                      
                                    </select>
                       </div>

                       <div class="col">
                          <label>Descripción</label>
                          <input type="text" class="form-control" name="descripcion" value="<?php echo $row['descripcion'] ?>" required>
                       </div>

                </div>

                <div class="row">
                   
                    <div class="col">
                    <label>Entra a lago</label>
                   <select name="lago" class="form-control" readonly>
                                      <option> <?php echo $row['lago'] ?> </option>
                                      
                                    </select>
                    </div>
             
                     <div class="col">

                     <label>Animal</label>
                                    <select class="form-control" name="animal" required>

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
                                    <label>Peso promedio (Gr)</label>
                                    <input type="number" step="any" class="form-control" name="promedioPeso" value="<?php echo $row['promedioPeso'] ?>" required>
                                    </div>

                </div>
              
                <div class="row">
                    
                    
                    <div class="col">
                     <label>Fecha</label>
                     <input type="date" class="form-control" name="fecha" value="<?php echo $row['fecha'] ?>" required>
                    </div>

                    <div class="col"></div>
                    <div class="col"></div>
                
                   
                </div>
                   <hr>
                <div class="row">
                    
                <div class="col">
                      <label>Cantidad inicial alevinos</label>
                      <input type="number" class="form-control" name="entraron" value="<?php echo $row['entraron'] ?>" readonly>
                    </div>

                    <div class="col">
                      <label>Lago de alevinaje</label>
                      <input type="text" class="form-control" name="lag" value="<?php echo $row['viene'] ?>" readonly>
                    </div>

                    <div class="col"></div>

                </div>

                    <button class="btn btn-primary" style="margin-top:30px">Guardar cambios</button>

            </form>

            <button class="btn btn-danger" style="width:147px" onclick="history.go(-1)">Cancelar</button>
           
         </div>
    </div>

<?php
      }else{
?>

 <div class="container">
      <div class="card">
           <div class="card-header">
              <h5>Editar registro salidas</h5>
           </div>

            <div class="container">
                 <table class="table table-hover" id="tabla">
                        <thead>
                             <tr>
                               <th>Lago alevinaje</th>
                               <th>Siembra</th>
                               <th>Lago de engorde</th>
                               <th>Cantidad hacia engorde</th>
                               <th>Acción</th>
                             </tr>
                        </thead>

                        <tbody>
                         <?php
                            foreach($queryRegistro as $rwReg){
                         ?>
                           <tr>
                               <td> <?php echo $rwReg['lago'] ?> </td>
                               <td> <?php echo $rwReg['siembra'] ?> </td>
                               <td> <?php echo $rwReg['lagoEngorde'] ?> </td>
                               <td> <?php echo $rwReg['cantidad'] ?> </td>
                               <td>

                                 <a href="./v_editarRegistro.php?codigoInterno=<?php echo $rwReg['codigoInterno'] ?>">
                                       <button class="btn btn-warning">
                                          <i class="far fa-edit"></i>  
                                       </button>
                                 </a>

                               </td>
                           </tr>

                        <?php
                            }
                         ?>

                        </tbody>
                 </table>
                 
                 <a href="./v_listarSalidas.php">
                    <button class="btn btn-danger">Cancelar</button>
                 </a>
                 
            </div>

      </div>
 </div>


<?php
      }
?>

<script src="../../assets/jquery/jquery-3.5.1.min.js"></script>
<script src="../../assets/bootstrap/js/bootstrap.min.js"></script> 

</body>
</html>