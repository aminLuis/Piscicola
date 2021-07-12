<?php
require('../../models/m_usuario/m_sesion.php');
require('../../config/connect.php');
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
 

    <title>Siembra</title>
</head>
<body>


  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h5 class="modal-title text-light">Costo por siembra</h5>
        
      </div>
      <div class="modal-body">

            <form method="POST" action="./v_costoSiembra.php">
               
               
                 <div class="row">
                    <div class="col">
                       <label>Ingrese siembra</label>
                       <select name="siembra" class="form-control" required>
                         <option></option>
                         <?php
                         foreach($siembras as $siembra){

                         ?>
                            <option > <?php echo $siembra ?> </option>
                         <?php
                         }
                         ?>
                       </select>
                    </div>
                 </div>
               <button class="btn btn-success" style="margin-top:30px">Aceptar</button>
            </form>

       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="history.go(-1)">Cancelar</button>
        
      </div>
    </div>
  </div>

    
</body>
</html>