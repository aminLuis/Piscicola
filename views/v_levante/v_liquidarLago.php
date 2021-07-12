<?php
require('../../models/m_usuario/m_sesion.php');
$codigo = $_GET['codigo'];
require('../../controllers/c_alevinaje/c_cargarSalida.php');
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

    <title>Liquidar lago</title>
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
             <label>Lago</label>
             <input type="text" class="form-control" value="<?php echo $row['lago'] ?>" readonly>
           </div>

           <div class="col">
             <label>Siembra</label>
             <input type="text" class="form-control" value="<?php echo $row['siembra'] ?>" readonly>
           </div>

        </div>  
        <br>
        <p>El lago será liquidado permanentemente en ésta siembra.</p>
        <p>¿Desea continuar?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="history.go(-1)">Cancelar</button>
      
        <a href="../../models/m_levante/m_liquidarLago.php?codigo=<?php echo $row['codigo'] ?>">
          <button type="button" class="btn btn-success">Continuar</button>
        </a>
      
      </div>
    </div>
  </div>

 

</body>
</html>