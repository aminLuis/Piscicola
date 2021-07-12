<?php
require('../../models/m_usuario/m_sesion.php');
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

    <title>Lago liquidado</title>
</head>
<body>


  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h5 class="modal-title text-light">Error lago</h5>
       
      </div>
      <div class="modal-body">
        <p>La acción que quiere implementar no es posible, ya que el lago ha sido liquidado.</p>
      </div>
      <div class="modal-footer">
        
        <a href="../../views/v_alevinaje/v_listarSalidas.php">
          <button type="button" class="btn btn-success">Aceptar</button>
        </a>
      
      </div>
    </div>
  </div>

    
</body>
</html>