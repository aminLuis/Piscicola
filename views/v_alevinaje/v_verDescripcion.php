<?php
require('../../models/m_usuario/m_sesion.php');
$codigo = $_GET['codigo'];
$animal = $_GET['animal'];
require('../../controllers/c_alevinaje/c_cargarSalida.php');
require('../../models/m_general/m_lagos.php');
require('../../models/m_general/m_listarSiembras.php');
require('../../controllers/c_alevinaje/c_buscarRegistro.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="Stylesheet" href="../../assets/bootstrap/css/bootstrap.min.css">
    <link rel="Stylesheet" href="../../assets/styles/alevinaje.css">

    <title>Descripción</title>


</head>
<body>
    
<?php
      if($rowRegistro['codigo']==null){
      
?>

<div class="container">
      <div class="card">
           <div class="card-header">
              <h5>Descripción salida</h5>
           </div>

            <div class="container">
                 <table class="table table-hover" id="tabla">
                        <thead>
                             <tr>
                               <th>Lago alevinaje</th>
                               <th>Siembra</th>
                               <th>Lago de engorde</th>
                               <th>Cantidad hacia engorde</th>
                               <th>Descripción</th>
                               <th>Fecha</th>
                             </tr>
                        </thead>

                        <tbody>
                         <?php
                            //foreach($queryRegistro as $rwReg){
                         ?>
                           <tr>
                               <td> <?php echo $row['viene'] ?> </td>
                               <td> <?php echo $row['siembra'] ?> </td>
                               <td> <?php echo $row['lago'] ?> </td>
                               <td> <?php echo $row['cantidad'] ?> </td>
                               <td> <?php echo $row['descripcion'] ?> </td>
                               <td> <?php echo $row['fecha'] ?> </td>
                           </tr>

                        <?php
                           // }
                         ?>

                        </tbody>
                 </table>
                 
                 <a href="./v_listarSalidas.php">
                    <button class="btn btn-primary">Regresar</button>
                 </a>
                 
            </div>

      </div>
 </div>



<?php
      }else{
?>

 
<div class="container">
      <div class="card">
           <div class="card-header">
              <h5>Descripción salida</h5>
           </div>

            <div class="container">
                 <table class="table table-hover" id="tabla">
                        <thead>
                             <tr>
                               <th>Lago alevinaje</th>
                               <th>Siembra</th>
                               <th>Lago de engorde</th>
                               <th>Cantidad hacia engorde</th>
                               <th>Descripción</th>
                               <th>Fecha</th>
                             </tr>
                        </thead>

                        <tbody>
                         <?php
                            foreach($queryRegistro as $rwReg){
                               if($rwReg['animal']==$animal){
                         ?>
                           <tr>
                               <td> <?php echo $rwReg['lago'] ?> </td>
                               <td> <?php echo $rwReg['siembra'] ?> </td>
                               <td> <?php echo $rwReg['lagoEngorde'] ?> </td>
                               <td> <?php echo $rwReg['cantidad'] ?> </td>
                               <td> <?php echo $rwReg['descripcion'] ?> </td>
                               <td> <?php echo $rwReg['fecha'] ?> </td>
                           </tr>

                        <?php
                               }
                            }
                         ?>

                        </tbody>
                 </table>
                 
                 <a href="./v_listarSalidas.php">
                    <button class="btn btn-primary">Regresar</button>
                 </a>
                 
            </div>

      </div>
 </div>



<?php
      }
?>


</body>
</html>