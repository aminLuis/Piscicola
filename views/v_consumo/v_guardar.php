<?php
require('../../models/m_usuario/m_sesion.php');
require('../../models/m_general/m_lagos.php');
require('../../controllers/c_consumo/c_listar.php');
require('../../models/m_admin/m_vectorSiembras.php');
require('../../models/m_general/m_alimentos.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Consumo alimento</title>


    <link rel="Stylesheet" href="../../assets/bootstrap/css/bootstrap.min.css">
    <link rel="Stylesheet" href="../../assets/styles/admin.css">
    <link rel="Stylesheet" href="../../assets/styles/alevinaje.css">
    <link rel="Stylesheet" href="../../assets/icons/css/all.min.css">

    <link rel="Stylesheet" href="../../assets/jquery/jquery.dataTables.min.css">
    <link rel="Stylesheet" href="../../assets/jquery/dataTables.bootstrap4.min.css">

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
        <a class="navbar-brand" ><h5>Consumo</h5></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
          
             <!-- Enlace para botones o links !-->
           
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

</head>
<body>
    
 <div class="container">

     <div class="card">

          <div class="cardbody">

                <div class="card-header">
                <h5>Consumo alimento</h5>
                </div>

               <div class="container">

              

                   <form method="POST" action="../../models/m_consumo/m_guardar.php">

                        <div class="row">

                                    <div class="col">

                                        <label>Alimento</label>

                                        <select name="alimento" class="form-control" required>
                                        <option></option>

                                        <?php
                                        foreach($alimentos as $alimento){
                                        ?>

                                            <option> <?php echo $alimento ?> </option>                                 

                                        <?php
                                        }
                                        ?>

                                        </select>

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

                                    <div class="col">
                                       
                                       <label>Animal</label>
                                       <select name="animal" class="form-control" required>
                                           <option></option>
                                           <option>Cachama</option>
                                           <option>Bocachico</option>
                                       </select>

                                    </div>

                        </div>


                        <div class="row">

                           
                           <div class="col">
                              <label>Kilos</label>
                              <input type="number" step="any" class="form-control" name="kilos" required>
                           </div>

                            <div class="col">
                               <label>Siembra</label>
                                <select name="siembra" class="form-control">
                                  <option></option>
                                  <?php
                                    foreach($siembra as $siem){
                                  ?>
                                        <option> <?php echo $siem ?> </option>
                                  <?php
                                    }
                                  ?>
                                </select>
                            </div>

                           <div class="col">
                              <label>Fecha</label>
                              <input type="date" class="form-control" name="fecha" required>
                           </div>

                        </div>
                        
                        <button class="btn btn-success" style="margin-top: 30px">Guardar</button>
                      
                   </form>

                    <hr>


                  <table class="table table-hover" id="tabla">
 
                      <thead>
                          <tr>
                              <th scope="col">Código</th>
                              <th scope="col">Alimento</th>
                              <th scope="col">Lago</th>
                              <th scope="col">Animal</th>
                              <th scope="col">Kilos</th>
                              <th scope="col">Costo kilo</th>
                              <th scope="col">Costo flete</th>
                              <th scope="col">Siembra</th>
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
                              <td> <?php echo $row['alimento'] ?> </td>
                              <td> <?php echo $row['lago'] ?> </td>
                              <td> <?php echo $row['animal'] ?> </td>
                              <td> <?php echo $row['kilos'] ?> </td>
                              <td> <?php echo $row['precio'] ?> </td>
                              <td> <?php echo $row['flete'] ?> </td>
                              <td> <?php echo $row['siembra'] ?> </td>
                              <td> <?php echo $row['fecha'] ?> </td>
                              <td>


                                  <a href="../../views/v_consumo/v_editar.php?codigo=<?php echo $row['codigo'] ?>">
                                      <button class="btn btn-warning"> 
                                      <i class="far fa-edit"></i> 
                                      </button>
                                  </a>   
                            
                                  
                               <?php
                                 if($varSesion['tipo']=='admin'||$varSesion['tipo']=='root'){
                               ?>
                               
                                  <a href="../v_consumo/v_eliminar.php?codigo=<?php echo $row['codigo'] ?>">
                                      <button name="cod" class="btn btn-danger"> 
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
                              <th scope="col">Alimento</th>
                              <th scope="col">Lago</th>
                              <th scope="col">Animal</th>
                              <th scope="col">Kilos</th>
                              <th scope="col">Costo kilo</th>
                              <th scope="col">Costo flete</th>
                              <th scope="col">Siembra</th>
                              <th scope="col">Fecha</th>
                              <th scope="col">Acción</th>
                          </tr>
                        </tfoot>
                  </table>


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