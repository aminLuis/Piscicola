<?php
require('../../models/m_usuario/m_sesion.php');
$codigo = $_GET['codigo'];
require('../../controllers/c_bitacora/c_cargarBitacora.php');
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

    <title>Bitácora</title>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
        <a class="navbar-brand" >Bitácora</a>
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

                <a class="dropdown-item" href="./v_nueva.php">Nueva bitácora</a>
                <a class="dropdown-item" href="./v_listarBitacoras.php">Listar todas</a>
                
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
           
               <div class="card-header bg-info">
                  <h5 class="modal-title text-white">Bitácora</h5>
               </div>

               <div class="container">
                 
                  <div class="row">
                          
                            <div class="col"></div>

                            <div class="col">
                                <textarea name="" id="" cols="50" rows="15" class="form-control bita" readonly>
                                <?php echo $row['notacion'] ?>
                                </textarea>
                            </div>
                            
                            <div class="col"></div>
                 
                  </div>
                        <br>
                        <hr>
                        <h6>Detalles de bitácora</h6>
                        <hr>

                        <table class="table table-hover">
                            <thead>
                                <tr>
                                   <th>Código</th>
                                   <th>Autor</th>
                                   <th>Asunto</th>
                                   <th>Fecha</th>
                                   <th>Hora</th>
                                   <th>Acción</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td> <?php echo $row['codigo'] ?> </td>
                                    <td> <?php echo $row['autor'] ?> </td>
                                    <td> <?php echo $row['asunto'] ?> </td>
                                    <td> <?php echo $row['fecha'] ?> </td>
                                    <td> <?php echo $row['hora'] ?> </td>
                                    <td>
                                      
                                      <a href="./v_eliminar.php?codigo=<?php echo $row['codigo'] ?>">
                                        <button class="btn btn-danger">
                                        <i class="far fa-trash-alt"></i>
                                        </button>
                                       </a>
                                    
                                    </td>
                                </tr>
                            </tbody>
                        </table>

               </div>

           </div>

     </div>

     <script src="../../assets/jquery/jquery-3.5.1.min.js"></script>
     <script src="../../assets/bootstrap/js/bootstrap.min.js"></script> 


</body>
</html>