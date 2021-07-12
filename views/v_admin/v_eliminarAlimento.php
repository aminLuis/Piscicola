<?php
require('../../models/m_usuario/m_sesion.php');
require('../../models/m_general/m_noAutorizado.php');
$codigo = $_GET['codigo'];
require('../../controllers/c_admin/c_editarAlimento.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link rel="Stylesheet" href="../../assets/bootstrap/css/bootstrap.min.css">
    <link rel="Stylesheet" href="../../assets/styles/admin.css">

    <title>Eliminar registro</title>
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
                    <label>Tipo de alimento</label>
                    <input type="text" class="form-control" value="<?php echo $row['tipo'] ?>" readonly>
                    </div>

                    <div class="col">
                    <label>Total kilos (Kg)</label>
                    <input type="number" class="form-control" value="<?php echo $row['kilos'] ?>" readonly>
                    </div>

                    <div class="col">
                    <label>Precio kilogramo</label>
                    <input type="number" class="form-control" value="<?php echo $row['precio'] ?>" readonly>
                    </div>

                    </div>

                    <div class="row">

                    <div class="col">

                    <label>Fecha</label>
                    <input type="date" style="width:200px" class="form-control" value="<?php echo $row['fecha'] ?>" readonly>
                    </div>

                    </div>
 

                  <hr>
                     <p>El registro será eliminado permanentemente</p>
                     <p>¿Desea continuar?</p>
                  <hr>
      </div>
      <div class="modal-footer">
        
        <a href="./v_alimentos.php">
     
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>

        </a>
     
     <a href="../../models/m_admin/m_eliminarAlimento.php?codigo=<?php echo $row['codigo'] ?>">
        <button type="button" class="btn btn-success">Continuar</button>
     </a>
    
      </div>
    </div>
  </div>



    <script src="../../assets/jquery/jquery-3.5.1.min.js"></script>
    <script src="../../assets/bootstrap/js/bootstrap.min.js"></script> 
</body>
</html>