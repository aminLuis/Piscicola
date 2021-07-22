<?php
require('../../models/m_usuario/m_sesion.php');
$codigo = $_GET['codigo'];
require('../../controllers/c_alevinaje/c_cargarSalida.php');
require('../../controllers/c_alevinaje/c_buscarRegistro.php');

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

<?php
      if($rowRegistro['codigo']==null){
      
?>

  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h5 class="modal-title text-light">Advertencia</h5>
        
      </div>
      <div class="modal-body">

      <div class="row">
                
                <div class="col">
                   <label>Cantidad</label>
                   <input type="text" class="form-control" name="cantidad" value="<?php echo $row['cantidad'] ?>" readonly>
               </div>

               <div class="col">
                            <label>Siembra</label>
                            <select name="siembra"  class="form-control" readonly>
                               <option> <?php echo $row['siembra'] ?> </option>
                             
                            </select>
               </div>

               <div class="col">
                  <label>Descripción</label>
                  <input type="text" class="form-control" name="descripcion" value="<?php echo $row['descripcion'] ?>" readonly>
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

             <div class="col">
                            <label>Peso (Gr)</label>
                            <input type="number" step="any" class="form-control" name="promedioPeso" value="<?php echo $row['promedioPeso'] ?>" readonly>
                            </div>

        </div>
      
        <div class="row">
            
            
            <div class="col">
             <label>Fecha</label>
             <input type="date" class="form-control" name="fecha" value="<?php echo $row['fecha'] ?>" readonly>
            </div>

            <div class="col"></div>
            <div class="col"></div>
        
           
        </div>
           <hr>
            <p>El registro será eliminado permanentemente, a su vez la información
             relacionada a éste, como lo son las salidas de peces
            en el módulo de levante.
            </p>
            <p>¿Desea continuar con la acción?</p>
           <hr>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="history.go(-1)">Cancelar</button>
      
        <a href="../../models/m_alevinaje/m_eliminarSalida.php?codigo=<?php echo $row['codigo'] ?>">
          <button type="button" class="btn btn-success">Continuar</button>
        </a>
      
      </div>
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
                               <th>Cantida hacia engorde</th>
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

                               <?php
                                if($varSesion['tipo']=='admin' || $varSesion['tipo']=='root'){
                             ?>

                                 <a href="./v_eliminarRegistro.php?codigoInterno=<?php echo $rwReg['codigoInterno'] ?>">
                                       <button class="btn btn-danger">
                                       <i class="far fa-trash-alt"></i>
                                       </button>
                                 </a>

                                  <?php
                                }
                                  ?>

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

    
</body>
</html>