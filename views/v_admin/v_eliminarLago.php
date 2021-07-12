<?php
require('../../models/m_usuario/m_sesion.php');
require('../../models/m_general/m_noAutorizado.php');
$codigo = $_GET['codigo'];
require('../../controllers/c_admin/c_cargarLago.php');
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
    
    <title>Elimnar registro</title>
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
                <select name="la" class="form-control" readonly>
                    <option> <?php echo $row['lag'] ?> </option>
                </select>
                </div>

                <div class="col">
                    <label>Area del lago</label>
                    <input type="number" class="form-control" step="any" name="area"  value="<?php echo $row['area'] ?>" readonly>
                </div>

                </div>

        <p>Modal body text goes here.</p>
      </div>
      <div class="modal-footer">

      <a href="./v_lagos.php">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
      </a>  
    
       <a href="../../models/m_admin/m_eliminarLago.php?codigo=<?php echo $row['codigo'] ?>">
        <button type="button" class="btn btn-success">Continuar</button>
       </a>

      </div>
    </div>
  </div>


    <script src="../../assets/jquery/jquery-3.5.1.min.js"></script>  
    <script src="../../assets/bootstrap/js/bootstrap.min.js"></script>

</body>
</html>