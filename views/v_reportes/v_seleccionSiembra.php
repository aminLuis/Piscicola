<?php
require('../../models/m_usuario/m_sesion.php');
require('../../config/connect.php');
require('../../models/m_admin/m_vectorSiembras.php');
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

    <title>Siembra</title>
</head>
<body>
    

  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h5 class="modal-title text-white">Seleccione siembra</h5>
        
      </div>
      <div class="modal-body">
       <form method="POST" action="./v_reporteSiembra.php">
                <div class="row">
                
                    <div class="col">
                    <label for="">Siembra</label>
                    <select name="siembra" class="form-control" required>
                        <option value=""></option>
                        <?php
                        foreach($siembra as $rowSiembra){
                        ?>               
                            <option value=""> <?php echo $rowSiembra ?> </option>
                        <?php
                        }
                        ?>
                    </select>
                    </div>

                </div>
                <br>
                <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="history.go(-1);">Cancelar</button>
                <button type="submit" class="btn btn-success">Continuar</button>
           </form>

      </div>
      <div class="modal-footer">
       
      </div>
    </div>
  </div>


</body>
</html>