<?php
require('../../models/m_usuario/m_sesion.php');
require('../../models/m_general/m_lagos.php');
require('../../controllers/c_oxigenacion/c_listarOD.php');
require('../../models/m_admin/m_vectorSiembras.php');
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

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
        <a class="navbar-brand" >Oxigenación</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="./v_lago.php">Gráficas<span class="sr-only">(current)</span></a>
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

              
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="../../models/m_usuario/m_cerrarSesion.php">Cerrar sesión</a>

              </div>
            </div>

         </form>
       
        </div>
      </nav>



    <title>Oxigeno lagos</title>
</head>
<body>
    
    <div class="container">
         <div class="card">
              <div class="container">
               <div class="card-header">
                <h5>Parámetros OD</h5>
               </div>
                   <form method="POST" action="../../models/m_oxigenacion/m_guardar.php">
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
                               <label>Oxigeno disuelto (OD)</label>
                               <input type="number" step="any" class="form-control" name="oxigeno" required>
                             </div>
                        </div>

                        <div class="row">
                          <div class="col">
                               <label>Temperatura (°C)</label>
                               <input type="number" step="any" class="form-control" name="temperatura" required>
                          </div>
                          <div class="col">
                            <label>Fecha</label>
                            <input type="date" class="form-control" name="fecha" required>
                          </div>
                          <div class="col"></div>
                        </div>
 
                         <button class="btn btn-success" style="margin-top:30px">Guardar</button>

                   </form>

                   <table class="table table-hover" id="tabla">
                      <thead>
                           <tr>
                               <th scope="col">Código</th>
                               <th scope="col">Lago</th>
                               <th scope="col">Siembra</th>
                               <th scope="col">OD</th>
                               <th scope="col">Temperaturan (°C)</th>
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
                               <td> <?php echo $row['lago'] ?> </td>
                               <td> <?php echo $row['siembra'] ?> </td>
                               <td> <?php echo $row['oxigeno'] ?> </td>
                               <td> <?php echo $row['temperatura'] ?> </td>
                               <td> <?php echo $row['fecha'] ?> </td>
                               <td>
                                  
                                  

                                     <a href="./v_editar.php?codigo=<?php echo $row['codigo'] ?>">
                                          <button class="btn btn-warning">
                                            <i class="far fa-edit"></i>  
                                          </button>
                                     </a>

                                     <?php
                                       if($varSesion['tipo']=='admin' || $varSesion['tipo']=='root'){
                                     ?>

                                     <a href="./v_eliminar.php?codigo=<?php echo $row['codigo'] ?>">
                                          <button class="btn btn-danger" style="width:45px">
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
                               <th scope="col">Código</th>
                               <th scope="col">Lago</th>
                               <th scope="col">Siembra</th>
                               <th scope="col">OD</th>
                               <th scope="col">Temperaturan (°C)</th>
                               <th scope="col">Fecha</th>
                               <th scope="col">Acción</th>
                           </tr>
                      </tfoot>
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