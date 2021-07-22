<?php
require('../../models/m_usuario/m_sesion.php');
$codigoInterno = $_GET['codigoInterno'];
require('../../controllers/c_alevinaje/c_cargarSoloRegistro.php');
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
                   <label>Cantidad</label>
                   <input type="text" class="form-control" name="cantidad" value="<?php echo $row['cantidad'] ?>" readonly>
               </div>

               <div class="col">
                            <label>Siembra</label>
                            <select name="siembra"  class="form-control" readonly>
                               <option> <?php echo $row['siembra'] ?> </option>
                             
                            </select>
               </div>

              

        </div>

        <div class="row">
           
            <div class="col">
            <label>Lago engorde</label>
                        <select name="lago" class="form-control" readonly>
                              <option> <?php echo $row['lagoEngorde'] ?> </option>
                      </select>
            </div>
     
            <div class="col">
            <label>Lago alevinaje</label>
                        <select name="lago" class="form-control" readonly>
                              <option> <?php echo $row['lago'] ?> </option>
                      </select>
            </div>
             

             

        </div>
      
        <div class="row">
            
            
            

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
      
        <a href="../../models/m_alevinaje/m_eliminarRegistro.php?codigoInterno=<?php echo $row['codigoInterno'] ?>">
          <button type="button" class="btn btn-success">Continuar</button>
        </a>
      
      </div>
    </div>
  </div>


</body>
</html>