<?php
require('../../models/m_usuario/m_sesion.php');
require('../../controllers/c_levante/c_diasVida.php');
require('../../controllers/c_levante/c_diasVidaVarios.php');
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

    <link rel="Stylesheet" href="../../assets/jquery/jquery.dataTables.min.css">
    <link rel="Stylesheet" href="../../assets/jquery/dataTables.bootstrap4.min.css">


    <title>Dias de vida</title>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
        <a class="navbar-brand" ><h5>Dias de vida</h5></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
          

          </ul>
          <form class="form-inline my-2 my-lg-0">
         
          <div class="btn-group dropleft">
              <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <?php echo $varSesion['nombre'],'.'?>
              <i class="fas fa-user"></i>
              </button>
              <div class="dropdown-menu">
              
               <?php
                    if($varSesion['tipo']=='admin'||$varSesion['tipo']=='root'){
               ?>
                    <a class="dropdown-item" href="../../views/v_admin/home.php">Home</a>
               <?php
                    }else{
               ?>
                    <a class="dropdown-item" href="../../views/v_userFinal/home.php">Home</a>
               <?php
                    }
               ?>
              

                <a class="dropdown-item" href="./v_guardar.php">Levante</a>
                <a class="dropdown-item" href="../../views/v_alevinaje/v_guardar.php">Alevinaje</a>
                <a class="dropdown-item" href="../../views/v_alevinaje/v_listarSalidas.php">Salidas alevinaje</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="../../models/m_usuario/m_cerrarSesion.php">Cerrar sesión</a>

              </div>
            </div>

         </form>
       
        </div>
      </nav>


</head>
<body>

<?php
   if($rowRegistroSalida['codigo']==null){
?>

    <div class="container">
         <div class="card">
               <div class="card-header">
                  <h5>Dias de vida peces</h5>
               </div>

               <div class="container">
                    
                    <table class="table table-hover" id="tabla">
                        <thead>
                             <tr>
                                  <th>Lago alevinaje</td>
                                  <th>Fecha ingreso alevinaje</td>
                                  <th>Lago de engorde</td>
                                  <th>Fecha de pesca</td>
                                  <th>Siembra</th>
                                  <th>Total dias de vida</td>
                             </tr>
                        </thead>

                        <tbody>
                              <tr>
                                   <td> <?php echo $viene ?> </td>
                                   <td> <?php echo $fechaAlevinaje  ?> </td>
                                   <td> <?php echo $lago  ?> </td>
                                   <td> <?php echo $fechaLevante  ?> </td>
                                   <td> <?php echo $siembra  ?> </td>
                                   <td> <?php echo $totalDias ?> </td>
                              </tr>
                        </tbody>
                    </table>

               </div>
         </div>
    </div>


    <?php
   }else{

   
    ?>

   
<div class="container">
         <div class="card">
               <div class="card-header">
                  <h5>Dias de vida peces</h5>
               </div>

               <div class="container">
                    
                    <table class="table table-hover" id="tabla">
                        <thead>
                             <tr>
                                  <th>Lago alevinaje</td>
                                  <th>Fecha ingreso alevinaje</td>
                                  <th>Lago de engorde</td>
                                  <th>Fecha de pesca</td>
                                  <th>Siembra</th>
                                  <th>Total dias de vida</td>
                             </tr>
                        </thead>

                        <tbody>
                          <?php
                          $i = 0;
                             foreach($queryRegistroSalida as $row){
                          ?>
                              <tr>
                                   <td> <?php echo $row['lago'] ?> </td>
                                   <td> <?php echo $row['fecha'] ?> </td>
                                   <td> <?php echo $row['lagoEngorde'] ?> </td>
                                   <td> <?php echo $fechaLevante ?> </td>
                                   <td> <?php echo $row['siembra'] ?> </td>
                                   <td> <?php echo $dates[$i] ?> </td>
                              </tr>
                              <?php
                         $i++;    
                         }
                              ?>
                        </tbody>
                    </table>

               </div>
         </div>
    </div>





    <?php
   }
    ?>

    
    <script src="../../assets/jquery/jquery-3.5.1.min.js"></script>
    <script src="../../assets/bootstrap/js/bootstrap.min.js"></script> 

    <script src="../../assets/jquery/jquery.dataTables.min.js"></script>
    <script src="../../assets/jquery/dataTables.bootstrap4.min.js"></script>

    <script src="../../assets/jquery/dataTables.buttons.min.js"></script>
    <script src="../../assets/jquery/jszip.min.js"></script>
    <script src="../../assets/jquery/pdfmake.min.js"></script>
    <script src="../../assets/jquery/vfs_fonts.js"></script>
    <script src="../../assets/jquery/buttons.html5.min.js"></script>
    <script src="../../assets/jquery/buttons.print.min.js"></script>

    <script src="../../assets/DataTables/DataTables.js"></script>


</body>
</html>