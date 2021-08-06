<?php
require('../../models/m_usuario/m_sesion.php');
$lago = $_GET['lago'];
$siembra = $_GET['siembra'];
require('../../controllers/c_reportes/c_detalleConsumo.php');
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

    <title>Detalles</title>
</head>
<body>

    <div class="container">
      
         <div class="card">
         
              <div class="card-header">
              <h5>Detalles consumo <?php echo $siembra,' - ',$lago ?></h5>
              </div>
              <div class="container">
                
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Tipo de alimento</th>
                                <th>Kilos</th>
                                <th>Costo kilo</th>
                                <th>Fecha consumo</th>                    
                            </tr>
                        </thead>

                        <tbody>
                        <?php 
                           foreach($query as $rowConsumo){
                        ?>
                            <tr>
                                <td> <?php echo $rowConsumo['alimento'] ?> </td>
                                <td> <?php echo $rowConsumo['kilos'] ?> </td>
                                <td> <?php echo $rowConsumo['precio'] ?> </td>
                                <td> <?php echo $rowConsumo['fecha'] ?> </td>
                            </tr>
                            <?php
                           }
                            ?>
                        </tbody>
                    </table>
                    <form method="POST" action="./v_reporteSiembra.php">
                       <input name="siembra" type="hidden" value="<?php echo $siembra ?>">
                       <button class="btn btn-primary">Regresar</button>
                    </form> 
                
              </div>

         </div>
        
    </div>
    
</body>
</html>
