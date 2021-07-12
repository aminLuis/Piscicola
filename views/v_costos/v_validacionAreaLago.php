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

    <title>Area lago</title>

</head>
<body>
    

  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h5 class="modal-title text-light">Error</h5>
       
      </div>
      <div class="modal-body">
        <p>El lago ingresado no se le ha fijado el area.</p>
        <p>Debe fijar el area para calcular los costos correspondientes a dicha area</p>
      </div>
      <div class="modal-footer">
    
         <a href="../../views/v_admin/v_lagos.php">
         <button type="button" class="btn btn-primary" data-dismiss="modal">Ir a lagos-area</button>
         </a>

      <a href="./v_costoLago.php">
        <button type="button" class="btn btn-success">Aceptar</button>
       </a>
      
    </div>
    </div>
  </div>


    <script src="../../assets/jquery/jquery-3.5.1.min.js"></script>
    <script src="../../assets/bootstrap/js/bootstrap.min.js"></script> 

</body>
</html>