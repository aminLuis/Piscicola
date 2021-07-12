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
    <link rel="Stylesheet" href="../../assets/styles/admin.css">

    <title>Stock alimento</title>
</head>
<body>
    



  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h5 class="modal-title text-light">Stock alimento</h5>
      </div>
      <div class="modal-body">
        <p>Es posible que el alimento esté agotado o la cantidad a ingresar en el consumo 
        es mayor a la existente en el stock.</p>
        <p>Consulte con el administrador.</p>
      </div>
      <div class="modal-footer">
     
      <a href="./v_guardar.php">
        <button type="button" class="btn btn-success">Aceptar</button>
      </a>
     
      </div>
    </div>
  </div>


</body>
</html>