<?php
require('../../models/m_usuario/m_sesion.php');
require('../../models/m_general/m_noAutorizado.php');
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

    <title>Costos siembra</title>
</head>
<body>
    


  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h5 class="modal-title text-light">Error costos siembra</h5>
        
      </div>
      <div class="modal-body">
        <p>La siembra seleccionada no se le ha sido asignado los costos
            totales.</p>
      </div>
      <div class="modal-footer">
      
        <a href="../../views/v_admin/v_costoSiembra.php">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Ir a costos siembra</button>
        </a>
        
           <button type="button" class="btn btn-success" onclick="history.go(-1)">Acceptar</button>
      

    </div>
    </div>
  </div>



    <script src="../../assets/jquery/jquery-3.5.1.min.js"></script>
    <script src="../../assets/bootstrap/js/bootstrap.min.js"></script> 

</body>
</html>