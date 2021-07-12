<?php
require('../../models/m_usuario/m_sesion.php');
require('../../models/m_general/m_noAutorizado.php');
require('../../models/m_usuario/m_listar.php');
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

    <title>Crear usuario</title>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
        <a class="navbar-brand" ><h5>Usuarios</h5></a>
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
              
                <a class="dropdown-item" href="../../views/v_admin/home.php">Home</a>
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
              <div class="card-header">
              <h5>Datos usuario</h5>
               </div>
              <div class="container">
                 
                   <form method="POST" action="../../models/m_usuario/m_crearUsuario.php">
                       <div class="row">
                           <div class="col">
                               <label>Nombre</label>
                               <input type="text" class="form-control" name="nombre" required>
                           </div>
                           <div class="col">
                               <label>Primer apellido</label>
                               <input type="text" class="form-control" name="primerApe" required>
                           </div>
                           <div class="col">
                                <label>Segundo apellido</label>
                                <input type="text" class="form-control" name="segundoApe" required>
                           </div>
                       </div>

                       <div class="row">
                             <div class="col">
                                <label>Dirección</label>
                                <input type="text" class="form-control" name="direccion" required>
                             </div>
                             <div class="col">
                                <label>Télefono</label>
                                <input type="text" class="form-control" name="telefono" required>
                             </div>
                             <div class="col">
                             </div>
                       </div>
                       <hr>
                          <div class="card-header">
                          <h6>Usuario y contraseña</h6>
                          </div>
                          
                       <hr>
                       <div class="row">
                           <div class="col">
                             <label>Usuario</label>
                             <input type="number" class="form-control" name="user" placeholder="Ingrese número de cédula" required>
                           </div>
                           <div class="col">
                             <label>Contraseña</label>
                             <input type="password" class="form-control" name="passwd" required>
                           </div>
                       </div>
                       <hr>
                       <button type="submit" class="btn btn-success">Guardar</button>
                   </form>

                    <table class="table">
                         <thead>
                            <tr>
                                <th scope="col">Nombre</th>
                                <th scope="col">Primer apellido</th>
                                <th scope="col">Segundo apellido</th>
                                <th scope="col">Dirección</th>
                                <th scope="col">Teléfono</th>
                                <th scope="col">Usuario</th>
                                <th scope="col">Acción</th>
                            </tr>
                         </thead>

                         <tbody>
                             <?php
                                foreach($query as $row){
                                   if($row['tipo']=='usuarios'){
                             ?>
                               <tr>
                                   
                                    <td> <?php echo $row['nombre'] ?> </td>
                                    <td> <?php echo $row['primerApe'] ?> </td>
                                    <td> <?php echo $row['segundoApe'] ?> </td>
                                    <td> <?php echo $row['direccion'] ?> </td>
                                    <td> <?php echo $row['telefono'] ?> </td>
                                    <td> <?php echo $row['user'] ?> </td>
                                    <td>
                                       <a href="./v_editarUsuario.php?user=<?php echo $row['user'] ?>">
                                          <button class="btn btn-warning">
                                             <i class="far fa-edit"></i>
                                          </button>
                                       </a>

                                       <a href="./v_nuevoPasswd.php?user=<?php echo $row['user'] ?>">
                                          <button class="btn btn-primary">
                                            <i class="fas fa-key"></i>
                                          </button>
                                       </a>

                                       <a href="./v_eliminar.php?user=<?php echo $row['user'] ?>">
                                          <button class="btn btn-danger">
                                             <i class="far fa-trash-alt"></i>
                                          </button>
                                       </a>
                                    </td>
                               </tr>
                               <?php
                                   }
                                }
                               ?>
                         </tbody>
                    </table>

              </div>
         </div>
    </div>



<script src="../../assets/jquery/jquery-3.5.1.min.js"></script>
<script src="../../assets/bootstrap/js/bootstrap.min.js"></script> 

</body>
</html>