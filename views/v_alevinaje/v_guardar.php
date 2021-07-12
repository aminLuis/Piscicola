<?php
require('../../models/m_usuario/m_sesion.php');
require_once('../../controllers/c_alevinaje/c_listar.php');
//require('../../controllers/c_admin/c_listarSiembras.php');
require('../../models/m_admin/m_vectorSiembras.php');
require('../../models/m_general/m_lagos.php');

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="Stylesheet" href="../../assets/bootstrap/css/bootstrap.min.css">
    <link rel="Stylesheet" href="../../assets/styles/alevinaje.css">
    <link rel="Stylesheet" href="../../assets/icons/css/all.min.css">
    <link rel="Stylesheet" href="../../assets/jquery/jquery.dataTables.min.css">
    <link rel="Stylesheet" href="../../assets/jquery/dataTables.bootstrap4.min.css">
    <title>Alevinaje</title>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
        <a class="navbar-brand" >Alevinaje</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="./v_listarSalidas.php">Salidas <span class="sr-only">(current)</span></a>
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

                <a class="dropdown-item" href="./v_mortandad.php">Mortandad alevinos</a>
                <a class="dropdown-item" href="../../views/v_levante/v_guardar.php">Levante</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="../../models/m_usuario/m_cerrarSesion.php">Cerrar sesión</a>

              </div>
            </div>

         </form>
       
        </div>
      </nav>


</head>
<body>
    
<section id="entrada">


              <div class="container">
               <div class="cardbody">
                  <div class="card">
                  <div class="card-header">
                           <h5>Entrada alevinos</h5>
                        </div>
                      <div class="container">

                      <br>

                          <form method="POST" action="../../models/m_alevinaje/m_guardar.php">
                              
                                  <div class="row">
                                      <div class="col">
                                      <label>Labor</label>
                                      <input type="text" class="form-control" name="labor" value="Entra a lago" readonly>
                                      </div>
                                      <div class="col">
                                      <label>Descripción</label>
                                      <input type="text" class="form-control" name="descripcion" required>
                                      </div>
                                      
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

                                  <div class="row">

                                      

                                      <div class="col">
                                      <label>Animal</label>
                                      <select class="form-control" name="animal" required>
                                          <option></option>
                                          <option>Cachama</option>
                                          <option>Bocachico</option>
                                      </select>
                                      </div>
                                      <div class="col">
                                      <label>Peso promedio (Gr)</label>
                                      <input type="number" step="any" class="form-control" name="pesoPromedio" required>
                                      </div>
                                      
                                      <div class="col">
                                        <label>Número de alevinos</label>
                                        <input type="text" class="form-control" name="cantidad" required>
                                      </div> 

                                  </div>

                                  

                                  <div class="row">

                                  
                                     
                                  <div class="col">
                                      <label>Siembra</label>
                                      <select name="siembra"  class="form-control" required>
                                         <option></option>
                                         <?php
                                         foreach($siembra as $siemb){
                                           
                                         ?>
                                              <option> <?php echo $siemb ?> </option>
                                          <?php
                                           
                                         }
                                          ?>

                                      </select>
                                      </div>
                                      <div class="col">
                                      <label>fecha</label>
                                      <input type="date" class="form-control" name="fecha" required>
                                      </div>
                                      
                                      <div class="col">
                                        <textarea class="textarea" placeholder="No ha incluido ninguna nota" name="nota"></textarea>
                                      </div>  

                                  </div>


                                  <div class="row">
                                      
                                  </div>

                                  <button type="submit" class="btn btn-success">Guardar</button>
                          </form>

                      <hr>

                      <table class="table table-hover" id="tabla">

                        <thead>

                          <tr>
                            <th scope="col">Codigo</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Lago</th>
                            <th scope="col">Animal</th>
                            <th scope="col">Peso promedio GR</th>
                            <th scope="col">Saldo alevinos</th>
                            <th scope="col">Siembra</th>
                            <th scope="col">Nota</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Acción</th>

                          </tr>

                        </thead>

                      
                      <tbody>

                          <?php
                            foreach($query as $row){
                          ?>
                     

                            <tr>
                                <td> <?php echo $row['codigo'] ?> </td>
                                <td> <?php echo $row['salida'] ?> </td>
                                <td> <?php echo $row['descripcion'] ?> </td>
                                <td> <?php echo $row['lago'] ?> </td>
                                <td> <?php echo $row['animal'] ?> </td>
                                <td> <?php echo $row['pesoPromedio'] ?> </td>
                                <td> <?php echo $row['saldo'] ?> </td>
                                <td> <?php echo $row['siembra'] ?> </td>
                                <td> <?php echo $row['nota'] ?> </td>
                                <td> <?php echo $row['fecha'] ?> </td>
                                <td>

                                

                                  <a href="../../views/v_alevinaje/v_editar.php?codigo=<?php echo $row['codigo'] ?>">
                                    <button class="btn btn-warning">
                                      <i class="far fa-edit"></i>  
                                    </button>
                                 </a>
                                
                              

                                <a href="./v_salida.php?lago=<?php echo $row['lago'] ?>&siembra=<?php echo $row['siembra'] ?>&cantidad=<?php echo $row['cantidad'] ?>&saldo=<?php echo $row['saldo'] ?>">
                                   <button class="btn btn-success" style="margin-top: 5px; width: 45px;">
                                   <i class="fas fa-sign-out-alt"></i>
                                   </button>
                                </a>

                                
                                <a href="./v_mortandad.php?lago=<?php echo $row['lago'] ?>&siembra=<?php echo $row['siembra'] ?>">
                                   <button class="btn btn-secondary" style="margin-top: 5px; width: 45px;">
                                   <i class="fas fa-skull-crossbones"></i>
                                   </button>
                                </a>

                                <a href="./v_liquidarLago.php?lago=<?php echo $row['lago'] ?>&siembra=<?php echo $row['siembra'] ?>">
                                   <button class="btn btn-primary" style="margin-top: 5px; width: 45px;">
                                   <i class="fas fa-window-close"></i>
                                   </button>
                                </a>

                                <?php
                                    if($varSesion['tipo']=='admin' || $varSesion['tipo']=='root'){
                                 ?>

                                <a href="../v_alevinaje/v_eliminar.php?codigo=<?php echo $row['codigo'] ?>">
                                   <button class="btn btn-danger" style="margin-top: 5px; width: 45px;">
                                      <i class="far fa-trash-alt"></i>
                                   </button>
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
                     
                         <tfoot>
                         <tr>
                            <th scope="col">Codigo</th>
                            <th scope="col">Labor</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Lago</th>
                            <th scope="col">Animal</th>
                            <th scope="col">Peso promedio GR</th>
                            <th scope="col">Número alevinos</th>
                            <th scope="col">Siembra</th>
                            <th scope="col">Nota</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Acción</th>

                          </tr>
                         </tfoot>

                      </table>

                    <br>

                    </div>

                  </div>
                </div>
              </div>
</section>



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