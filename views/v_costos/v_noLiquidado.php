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
    <link rel="Stylesheet" href="../../assets/styles/alevinaje.css">

    <title>No autorizado</title>
</head>
<body>


  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h5 class="modal-title text-white">Error lago</h5>
        
      </div>
      <div class="modal-body">
        <p>El lago no ha sido liquidado, debe liquidar el lago en el módulo de 'Levante' en 'Saldos'</p>
      </div>
      <div class="modal-footer">
        
      <a href="../../views/v_levante/v_saldos.php">
           <button type="button" class="btn btn-primary">Ir a saldo levante</button>
        </a>
        <a href="./v_CostoLago.php">
           <button type="button" class="btn btn-success">Aceptar</button>
        </a>

      </div>
    </div>
  </div>

<?php 
die();
?>

</body>
</html>