<?php
require('../../models/m_usuario/m_sesion.php');
require('../../models/m_general/m_lagos.php');
require('../../models/m_admin/m_listarSiembras.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="Stylesheet" href="../../assets/bootstrap/css/bootstrap.min.css">
    <link rel="Stylesheet" href="../../assets/styles/admin.css">

    <title>Costo lago</title>


    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" ><h5>Costos</h5></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
           
          <li class="nav-item active">
              <a class="nav-link" href="./v_historialCostos.php">Historial<span class="sr-only">(current)</span></a>
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


</head>
<body>
    

  
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header bg-success">
                <h5 class="modal-title text-white">Seleccione lago y siembra</h5>
                
              </div>
              <div class="modal-body">
                
              <form method="POST" action="./v_parametrosCostos.php">


                  <div class="row">

                      <div class="col">

                            <label>Lago</label>
                            <select name="la" class="form-control" required>
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
                          <select name="siembra" class="form-control" required>
                            <option></option>
                            <?php
                            foreach($siembras as $siembra){
                            ?>
                                   <option> <?php echo $siembra['siembra'] ?> </option>
                            <?php
                            }
                            ?>
                          </select>

                      </div>

                  </div>

                  <button type="submit" class="btn btn-success" style="margin-top:40px">Continuar</button>
              </form>

              </div>
              <div class="modal-footer">
               
              </div>
            </div>
          </div>
      


    <script src="../../assets/jquery/jquery-3.5.1.min.js"></script>
    <script src="../../assets/bootstrap/js/bootstrap.min.js"></script> 

</body>
</html>