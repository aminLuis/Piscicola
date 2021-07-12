<?php
require('../../models/m_usuario/m_sesion.php');
$codigo = $_GET['codigo'];
require('../../controllers/c_consumo/c_editar.php');
require('../../models/m_general/m_lagos.php');
require('../../models/m_general/m_alimentos.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="Stylesheet" href="../../assets/bootstrap/css/bootstrap.min.css">
    <link rel="Stylesheet" href="../../assets/styles/admin.css">
    <link rel="Stylesheet" href="../../assets/icons/css/all.min.css">

    <title>Eliminar registro</title>
</head>
<body>
    

  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h5 class="modal-title text-light">Advertencia</h5>
        </button>
      </div>
      <div class="modal-body">
    
               <div class="row">

                 <div class="col">
                   <label>Alimento</label>
                    <select class="form-control" name="alimento" readonly>
                      <option><?php echo $row['alimento'] ?></option>
                    </select>
                 </div>

                 <div class="col">
                    <label>Lago</label> 
                    <select class="form-control" name="lago" readonly>
                      <option> <?php echo $row['lago'] ?> </option>
                    </select>
                 </div> 


                 <div class="col">
                    <label>Animal</label>
                    <select class="form-control" name="animal" readonly>
                      
                       <?php
                         if($row['animal']=='Cachama'){
                       ?>
                           <option>Cachama</option>
                           
                       <?php
                         }else{
                       ?>
                            <option>Bocachico</option>
                            
                       <?php
                         }
                       ?>

                    </select>
                 </div>

               </div>


               <div class="row">

                 <div class="col">
                    <label>Kilos</label>
                    <input type="number" step="any" class="form-control" name="kilos" value="<?php echo $row['kilos'] ?>" readonly>
                 </div>

                 <div class="col">
                    <label>Fecha</label>
                    <input type="date" class="form-control" name="fecha" value="<?php echo $row['fecha'] ?>" readonly>
                 </div>

               </div>
           
           <hr>

                <p>El registro será eliminado permanentemente</p>
                <p>¿Desea continuar con la acción?</p>

           <hr>
      
      </div>
      <div class="modal-footer">
       <a href="../../views/v_consumo/v_guardar.php">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        </a>

        <a href="../../models/m_consumo/m_eliminar.php?codigo=<?php echo $row['codigo'] ?>">
          <button type="button" class="btn btn-success">Continuar</button>
        </a>  
      </div>
    </div>
  </div>



<script src="../../assets/jquery/jquery-3.5.1.min.js"></script>
<script src="../../assets/bootstrap/js/bootstrap.min.js"></script> 

</body>
</html>