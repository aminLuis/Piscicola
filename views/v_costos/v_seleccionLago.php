<?php
require('../../models/m_usuario/m_sesion.php');
require('../../models/m_general/m_lagos.php');
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

    <title>Selección lago</title>
</head>
<body>
    

        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white">Seleccione lago</h5>
                
            </div>
            <div class="modal-body">

                 
               <form method='POST' action="./v_graficaCostoLago.php">
               
                    <div class="row">
                         <div class="col">
                           <label>Lago</label>
                           <select name="lago" class="form-control" required>
                            <option></option>
                            <?php 
                              foreach($lagos as $lago){
                            ?>

                                <option> <?php echo $lago ?> </option>

                             <?php
                              }
                             ?>   

                           </select>
                         </div>
                    </div>
                
                     <button class="btn btn-success" style="margin-top:30px">Aceptar</button>

               </form>


              
            </div>
            <div class="modal-footer">
            
            <a href="./v_historialCostos.php">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            </a>
            
            </div>
            </div>
        </div>



    <script src="../../assets/jquery/jquery-3.5.1.min.js"></script>
    <script src="../../assets/bootstrap/js/bootstrap.min.js"></script> 

</body>
</html>