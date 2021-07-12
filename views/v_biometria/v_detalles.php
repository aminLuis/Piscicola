<?php
require('../../models/m_usuario/m_sesion.php');
$lago = $_POST['lago'];
$siembra = $_POST['siembra'];
require('../../models/m_biometria/m_detalles.php');
require('../../models/m_biometria/m_primerRegistro.php');
require('../../models/m_biometria/m_ultimoRegistro.php');
require('../../models/m_biometria/m_penultimoRegistro.php');
require('../../models/m_biometria/m_totales.php');
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

    <link rel="Stylesheet" href="../../assets/jquery/jquery.dataTables.min.css">
    <link rel="Stylesheet" href="../../assets/jquery/dataTables.bootstrap4.min.css">

    <title>Detalles lagos</title>


    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" ><h5>Detalles lagos</h5></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
        
          <li class="nav-item active">
            <a class="nav-link" href="./v_muestreo">Muestreo<span class="sr-only">(current)</span></a>
          </li>

          <li class="nav-item active">
            <a class="nav-link" href="./v_graficas.php?lago=<?php echo $lago ?>&siembra=<?php echo $siembra ?>">Graficas<span class="sr-only">(current)</span></a>
          </li>
       
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
                <a class="dropdown-item" href="../../views/v_biometria/v_muestreo.php">Muestreo</a>
               
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="../../models/m_usuario/m_cerrarSesion.php">Cerrar sesión</a>

              </div>
            </div>

         </form>
       
        </div>
      </nav>


</head>
<body>
    
<div class="container">

        <div class="card">
                <div class="cardbody">

                <div class="card-header">
                   <h5>Lago: <?php echo ' ',$lago; echo ' - Siembra: ',$siembra ?></h5>
                </div>

                         <div class="container">

                         <br>
                                               
                                <table class="table table-hover" id="tabla">
                                    <thead>
                                      <tr>
                                          <th scope="col">Animal</th>
                                          <th scope="col">Número animales</th>
                                          <th scope="col">Promedio (Gr)</th>
                                          <th scope="col">Biomasa (Kg)</th>
                                          <th scope="col">Kilos día</th>
                                          <th scope="col">Peso ganado (Kg)</th>
                                          <th scope="col">Conversión</th>
                                          <th scope="col">Fecha</th>
                                      </tr>
                                    </thead>

                                    <?php
                                      $ganado = 0;
                                      $i = 0;
                                      $anteriorBio = 0;
                                      $anteriorKg = 0;
                                      $conversion = 0;
                                      $totalPesoGanado = 0;
                                      $totalConversion = 0;
                                      foreach($query as $row){
                                      
                                          $ganado = $row['biomasa'] - $anteriorBio;
                                          $conversion = $anteriorKg / $ganado;
                                          if($i==0){
                                            $ganado = 0;
                                          }
                                        
                                    ?>

                                    <tbody>
                                      <tr>
                                          <td> <?php echo $row['animal'] ?> </td>
                                          <td> <?php echo $row['cantidad'] ?> </td>
                                          <td> <?php echo $row['promedio'] ?> </td>
                                          <td> <?php echo $row['biomasa'] ?> </td>
                                          <td> <?php echo $row['kilosDia'] ?> </td>
                                          <td> <?php echo $ganado ?> </td>
                                          <td> <?php echo $conversion ?> </td>
                                          <td> <?php echo $row['fecha'] ?> </td>
                                      </tr>
                                    </tbody>
                                   <?php
                                      
                                      $anteriorBio = $row['biomasa'];
                                      $anteriorKg = $row['kilosDia'];
                                      $totalPesoGanado = $totalPesoGanado + $ganado;
                                      $i++;
                                    }
                                    if($totalPesoGanado>0){
                                    $totalConversion = $totalAlimentoDado/$totalPesoGanado;
                                    }
                                   ?>
                                
                              </table>

                             <hr>
                             <hr>
                             <h6>Total alimento suministrado: <?php echo ' ',$totalAlimentoDado?></h6>
                             <h6>Total peso ganado: <?php echo ' ',$totalPesoGanado?></h6>
                             <h6>Total conversión: <?php echo ' ',$totalConversion?></h6>

                           
                        </div>      

                </div>
        </div>
</div>

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