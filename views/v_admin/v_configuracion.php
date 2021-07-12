<?php
require('../../models/m_usuario/m_sesion.php');
//require('../../models/m_general/m_noAutorizado.php');
require('../../controllers/c_admin/c_listarSiembras.php');
require('../../controllers/c_empresa/c_listar.php');
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

    <title>Configuración</title>


    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
        <a class="navbar-brand">Configuración</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
            <button type="button" class="btn btn-primary" onclick="mostrarEmpresa();">Empresa</button>
           </li>

           <li class="nav-item active">
           <button type="button" class="btn btn-primary" onclick="mostrarSiembras();">Siembras</button>
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
                 if($varSesion['tipo']=='admin' || $varSesion['tipo']=='root'){
               ?>
                  <a class="dropdown-item" href="./home.php">Home</a>
                <?php
                 }else{
                ?>
                    <a class="dropdown-item" href="../../views/v_userFinal/home.php">Home</a>
                <?php
                 }
                ?>
               
                
                <a class="dropdown-item" href="" data-toggle="modal" data-target="#exampleModal">Datos empresa</a>
                <a class="dropdown-item" href="../../views/v_empresa/v_editar.php">Cambiar datos empresa</a>
                <a class="dropdown-item" href="../../views/v_empresa/v_eliminar.php">Eliminar datos empresa</a>
                <a class="dropdown-item" href="./v_costoSiembra.php">Fijar costo siembra</a>
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
               
               <div class="container">

                   <section id="empresa" style="display: none;">
                          
                          <form method="POST" action="../../models/m_empresa/m_guardar.php">
                              <h5>Información empresa</h5>
                              <br>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Nombre empresa</label>
                                    <div class="col-sm-10">
                                    <input type="text" name="nombre" class="form-control" id="inputEmail3" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Dirección</label>
                                    <div class="col-sm-10">
                                    <input type="text" name="direccion" class="form-control" id="inputPassword3" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                    <input type="email" name="email" class="form-control" id="inputPassword3" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Teléfono</label>
                                    <div class="col-sm-10">
                                    <input type="number" name="telefono" class="form-control" id="inputPassword3" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">NIT</label>
                                    <div class="col-sm-10">
                                    <input type="text" name="nit" class="form-control" id="inputPassword3" required>
                                    </div>
                                </div>

                                <button class="btn btn-success" style="margin-top:30px">Guardar</button>
                          
                          </form>

                   </section>

                   <section id="siembras" style="display: block;">
                          
                   <form method="POST" action="../../models/m_admin/m_siembras.php">
                       <h5>Crear siembra</h5>

                            <div class="row">
                                <div class="col">
                                <label>Ingrese siembra</label>
                                <input type="text" class="form-control" placeholder="Ejemplo: S1" name="siembra" required>
                                </div>
                                
                                <div class="col">
                                 <label>Area total en producción</label>
                                 <input type="number" class="form-control" step="any" name="area" required>
                                </div>
                                
                                <div class="col">
                                 <label>Fecha creación</label>
                                <input type="date" class="form-control" name="fecha" required>
                                </div>
                            </div>

                            <button class="btn btn-success" style="margin-top:30px">Guardar</button>

                   </form>

                   <hr>

                   <table class="table table-hover" id="tabla">
                       <thead>
                           <tr>
                               <th scope="col">Código</th>
                               <th scope="col">Siembra</th>
                               <th scope="col">Estado</th>
                               <th scope="col">Area total</th>
                               <th scope="col">Fecha creación</th>
                               <th scope="col">Acción</th>
                           </tr>
                       </thead>
                       <tbody>
                       <?php
                       $estado = "";
                          foreach($siembras as $row){
                              if($row['estado']==true){
                                  $estado = 'ACTIVA';
                              }else{
                                  $estado = 'NO ACTIVA';
                              }
                       ?>
                            <tr>
                              <td> <?php echo $row['codigo'] ?> </td>
                              <td> <?php echo $row['siembra'] ?> </td>
                              <td> <?php echo $estado ?> </td>
                              <td> <?php echo $row['area'] ?> </td>
                              <td> <?php echo $row['fecha'] ?> </td>
                              <td>

                               

                                  <a href="./v_editarSiembra.php?codigo=<?php echo $row['codigo'] ?>">
                                    <button class="btn btn-warning"><i class="far fa-edit"></i></button>
                                  </a>

                                  <?php
                                     if($varSesion['tipo']=='admin' || $varSesion['tipo']=='root'){
                                  ?>

                                  <a href="./v_eliminarSiembra.php?codigo=<?php echo $row['codigo'] ?>">
                                    <button class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
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
                               <th scope="col">Siembra</th>
                               <th scope="col">Estado</th>
                               <th scope="col">Area total</th>
                               <th scope="col">Fecha creación</th>
                               <th scope="col">Acción</th>
                           </tr>
                            </tfoot>

                      </table>

                   </section>

               </div>

          </div>

      </div>

      <div class="modal" id="exampleModal" tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header bg-info">
              <h5 class="modal-title text-white">Datos empresa</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              
              <div class="row">
                   <div class="col">
                     <label>Nombre</label>
                     <input type="text" class="form-control" value="<?php echo $rowEmpresa['nombre'] ?>" readonly>
                   </div>
              </div>
               
              <div class="row">
                   <div class="col">
                     <label>Dirección</label>
                     <input type="text" class="form-control" value="<?php echo $rowEmpresa['direccion'] ?>" readonly>
                   </div>
              </div>

              <div class="row">
                   <div class="col">
                     <label>Email</label>
                     <input type="text" class="form-control" value="<?php echo $rowEmpresa['email'] ?>" readonly>
                   </div>
              </div>

              <div class="row">
                   <div class="col">
                     <label>Teléfono</label>
                     <input type="text" class="form-control" value="<?php echo $rowEmpresa['telefono'] ?>" readonly>
                   </div>
              </div>

              <div class="row">
                   <div class="col">
                     <label>NIT</label>
                     <input type="text" class="form-control" value="<?php echo $rowEmpresa['nit'] ?>" readonly>
                   </div>
              </div>

            </div>
            <div class="modal-footer">
              
            <button type="button" class="btn btn-success" data-dismiss="modal">Cerrar</button>
            </div>
          </div>
        </div>
   </div>

   


    <script src="../../assets/jquery/jquery-3.5.1.min.js"></script>  
    <script src="../../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../assets/javaScript/admin.js"></script>

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