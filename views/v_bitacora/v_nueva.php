<?php
require('../../models/m_usuario/m_sesion.php');
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
             <li class="nav-item active">
                <a class="nav-link" href="./v_listarBitacoras.php">Ver todas <span class="sr-only">(current)</span></a>
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
               if($varSesion['tipo']=='admin'||$varSesion['root']=='root'){
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
             <div class="card-header bg-success">
                <h5 class="modal-title text-white">Nueva bitácora</h5>
             </div>

             <div class="container">
                 <form method="POST" action="../../models/m_bitacora/m_nueva.php">
                       <div class="row">
                           <div class="col">
                                <label>Autor</label>
                                <input type="text" class="form-control" name="autor" required>
                           </div>

                           <div class="col">
                                <label>Asunto</label>
                                <input type="text" class="form-control" name="asunto" required>
                           </div>

                           
                       </div>
                       <hr>
                       <div class="row">
  
                            <div class="col"></div>

                            <div class="col">
                              <label>Ingrese notación</label>
                              <textarea name="notacion" cols="47" rows="6" class="form-control bita" required></textarea>
                            </div>

                            <div class="col"></div>

                       </div>
                    <hr>

                    <button class="btn btn-success">Guardar</button>

                 </form>
             </div>
        </div>
     </div>

    
    <script src="../../assets/jquery/jquery-3.5.1.min.js"></script>
    <script src="../../assets/bootstrap/js/bootstrap.min.js"></script> 


</body>
</html>