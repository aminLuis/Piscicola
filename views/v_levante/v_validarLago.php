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
    <link rel="Stylesheet" href="../../assets/icons/css/all.min.css">

    <title>Validación lago</title>
</head>
<body>
    


  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h5 class="modal-title text-light">Error lago y siembra</h5>
        
      </div>
      <div class="modal-body">
        <p>Es probable que el lago al cual se quiere descontar peces
            no le ha sido registrado la entrada de alevinos, es decir, la cantidad o saldo disponible
            en el lago ingresado.
            O la siembra no corresponda en la cual se encuentra el lago ingresado.
        </p>
        <p>
        Sí no es ninguna de las anteriores quiere decir que el lago ha sido liquidado
        </p>
        <p>Contacte al administrador</p>
      </div>
      <div class="modal-footer">

          <a href="./v_saldos.php">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Ir a saldos</button>
          </a>

            <button type="button" class="btn btn-success" onclick="history.go(-1);">Aceptar</button>

    </div>
    </div>
  </div>



    <script src="../../assets/jquery/jquery-3.5.1.min.js"></script>
    <script src="../../assets/bootstrap/js/bootstrap.min.js"></script> 
</body>
</html>