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

    <title>Reportes</title>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
        <a class="navbar-brand" >
       
        Reportes
        </a>
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
                 if($varSesion['tipo']=='admin' || $varSesion['tipo']=='root'){
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
    
     <div class="container" style="margin-top:50px">
     
        <div class="container">
         
            <div class="row">
            
                <div class="col">
                  
                     <a href="./v_seleccionSiembra.php" class="text-primary stretched-link">

                        <div class="alert alert-info">
                        <h5>Reporte siembra</h5>
                        <p>Alevinaje</p>
                        <p>Levante y engorde</p>
                        <p>Totales</p>
                        </div>
                  
                     </a>

                </div>

                <div class="col">
                
 
                </div>
            
            </div>

        </div>

     </div>


<script src="../../assets/jquery/jquery-3.5.1.min.js"></script>
<script src="../../assets/bootstrap/js/bootstrap.min.js"></script>

</body>
</html>