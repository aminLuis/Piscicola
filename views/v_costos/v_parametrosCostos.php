<?php
require('../../models/m_usuario/m_sesion.php');
$la = $_POST['la'];
$siembra = $_POST['siembra'];
require('../../controllers/c_costo/c_calcularCostos.php');
require('../../controllers/c_costos/c_cargarCosto.php');
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
    

    <title>Parámetros costos</title>


    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
        <a class="navbar-brand" ><h5>Costos</h5></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
           
              <!--- Enlaces para botones !-->

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
                <a class="dropdown-item" href="./v_historialCostos.php">Historial costos</a>
                <a class="dropdown-item" href="./v_siembra.php">Costo por siembra</a>
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

        <div class="card" style="">

                <div class="card-header">
                <h5>Parámetros costos</h5>
                </div>

             <div class="container">

                 <!--  <h6>Lago:<?php echo ' ',$la,' - Siembra: ',$siembra ?></h6> !-->

                  

                   <?php 
                   if($total==0){
                       
                       echo 'El consumo de alimento para el lago está en 0';
                   ?>
                        <a href="./v_costoLago.php">
                        <hr>
                           <button class="btn btn-success">Aceptar</button>
                        </a>
                   <?php 
                    die();
                   }
                   ?>

                  <form method="POST" action="../../models/m_costo/m_guardar.php">
                 
                     <div class="row">

                        <div class="col">
                        <label>Lago</label>
                        <input type="text" class="form-control" name="lago" value="<?php echo $la ?>" readonly>
                        </div>
                        <div class="col">
                        <label>Siembra</label>
                        <input type="text" class="form-control" name="siembra" value="<?php echo $siembra ?>" readonly>
                        </div>


                     </div>
                      <hr>
                    <div class="row">

                          <div class="col">

                               <label>Alimento + Flete</label>
                               <input type="number" class="form-control" name="alimento" value="<?php echo $total ?>" readonly>

                          </div>

                          <div class="col">
                              <label>Alevino</label>
                               <input type="number" class="form-control" name="alevino" required>
                          </div>

                          <div class="col">
                              <label>Bacteria</label>
                               <input type="number" class="form-control" name="bacteria" required>
                          </div>

                          
                          <div class="col">
                              <label>Energia</label>
                               <input type="number" class="form-control" name="energia" value="<?php echo $energia ?>" readonly>
                          </div>

                    </div>

                    <div class="row">

                        <div class="col">
                            <label>Nomina</label>
                            <input type="number" class="form-control" name="nomina" value="<?php echo $personalFijo ?>" readonly>
                        </div>

                        <div class="col">
                            <label>Asistencia técnica</label>
                            <input type="number" class="form-control" name="asistencia" value="<?php echo $asistencia ?>" readonly>
                        </div>

                        <div class="col">
                            <label>Jornales</label>
                            <input type="number" class="form-control" name="jornales" value="<?php echo $jornales ?>" readonly>
                        </div>

                        <div class="col">
                            <label>Proceso</label>
                            <input type="number" class="form-control" name="proceso" required>
                        </div>

                    </div>

                    <div class="row">

                        <div class="col">
                            <label>Insumo</label>
                            <input type="number" class="form-control" name="insumo" required>
                        </div>

                        <div class="col">
                            <label>Combustible</label>
                            <input type="number" class="form-control" name="combustible" value="<?php echo $combustible ?>" readonly>
                        </div>

                        <div class="col">
                            <label>Chinchorro</label>
                            <input type="number" class="form-control" name="chinchorro" required>
                        </div>

                        
                        <div class="col">
                            <label>Hielo</label>
                            <input type="number" class="form-control" name="hielo" required>
                        </div>

                    </div>

                    <div class="row">

                        <div class="col">
                            <label>Tiros</label>
                            <input type="number" class="form-control" name="tiros"  step="any" value="<?php echo $tiros ?>" readonly>
                        </div>

                        <div class="col">
                            <label>Dep. equipos</label>
                            <input type="number" class="form-control"  step="any" name="equipos" required>
                        </div>

                        <div class="col">
                        <label>Otros</label>
                        <input type="number" class="form-control" step="any" name="otro" required>
                        </div>

                        <div class="col">
                        <label>Fecha</label>
                        <input type="date" class="form-control" name="fecha" required>
                        </div>

                       

                    </div>

                     <button class="btn btn-success" style="margin-top:30px">Guardar</button>

                  </form>


                     <hr>
                         
                            <table id="tabla" class="table table-condensed table-sm">
                            
                                <thead>
                                    <tr>
                                          <th scope="col">Código</th>
                                          <th scope="col">Lago</th>
                                          <th scope="col">Siembra</th>
                                          <th scope="col">Total costos</th>
                                          <th scope="col">Fecha</th>
                                          <th scope="col">Acción</th>

                                    </tr>
                                </thead>
                                
                                <tbody>

                                   <?php
                                       foreach($qry as $row){
                                   ?>

                                     <tr>
                                        <td> <?php echo $row['codigo'] ?> </td>
                                        <td> <?php echo $row['lago'] ?> </td>
                                        <td> <?php echo $row['siembra'] ?> </td>
                                        <td> <?php echo $row['total'] ?> </td>
                                        <td> <?php echo $row['fecha'] ?> </td>
                                        <td>

                                         <a href="./v_detallesCosto.php?lago=<?php echo $la ?>&siembra=<?php echo $siembra ?>">
                                              <button class="btn btn-primary" style="width:45px"> <i class="fas fa-info"></i> </button>
                                          </a>
                                          
                                        <?php
                                          if($varSesion['tipo']=='admin' || $varSesion['tipo']=='root'){
                                        ?>

                                          <a href="./v_editarCosto.php?lago=<?php echo $la ?>&siembra=<?php echo $siembra ?>">
                                              <button class="btn btn-warning"> <i class="far fa-edit"></i> </button>
                                          </a>
                                          
                                          <a href="./v_eliminarCosto.php?lago=<?php echo $la ?>&siembra=<?php echo $siembra ?>">
                                              <button class="btn btn-danger" style="width:45px"> <i class="far fa-trash-alt"></i> </button>
                                          </a>
                                          
                                        <?php
                                          }
                                        ?>

                                        </td>
                                     </tr>

                                      <?php
                                       }
                                      ?>

                                </tbody>
                                 
                            </table>
                         
                        

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