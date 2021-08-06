<?php
require('../../models/m_usuario/m_sesion.php');
require('../../controllers/c_bitacora/c_listarBitacoras.php');
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

    <title>Home</title>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
        <a class="navbar-brand" >Usuario</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
           
          <li class="nav-item active">
              <a class="nav-link" href="../v_admin/v_configuracion.php">Configuración <span class="sr-only">(current)</span></a>
            </li>

            <li class="nav-item active">
              <a class="nav-link" href="../v_admin/v_alimentos.php">Alimentos <span class="sr-only">(current)</span></a>
            </li>

            <li class="nav-item active">
              <a class="nav-link" href="../v_admin/v_costoSiembra.php">Costos<span class="sr-only">(current)</span></a>
            </li>

            <li class="nav-item active">
              <a class="nav-link" href="../v_admin/v_lagos.php">Lagos<span class="sr-only">(current)</span></a>
            </li>
       
       
          </ul>
          <form class="form-inline my-2 my-lg-0">
         
            <div class="btn-group dropleft">
              <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               <?php echo $varSesion['nombre'],'.'?>
               <i class="fas fa-user"></i>
              </button>
              <div class="dropdown-menu">
              
              <a class="dropdown-item" href="" data-toggle="modal" data-target="#exampleModal">Datos empresa</a>
                <a class="dropdown-item" href="../v_usuario/v_cambiarPsswd.php?user=<?php echo $varSesion['user'] ?>">Cambiar contraseña</a>
                <a class="dropdown-item" href="#">Something else here</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="../../models/m_usuario/m_cerrarSesion.php">Cerrar sesión</a>

              </div>
            </div>
        </form>
        </div>
      </nav>
  

</head>
<body>

    <div class="bitacora">

        <h5>Bitácora</h5>

       
        <textarea class="area bita" readonly>
        <?php echo $row['notacion'] ?>
        </textarea>

        <div class="container" style="margin-top:10px">
        <a href="../v_bitacora/v_nueva.php">
          <button class="btn btn-info">Nueva bitácora</button>
        </a>
        <a href="../../views/v_bitacora/v_detalles.php?codigo=<?php echo $row['codigo'] ?>">
          <button class="btn btn-info" style="float:right; width:140px">Ver detalles</button>
        </a>
        </div>

    </div>
    
    <div class="container">
       
        <div class="row">
          
            <div class="col">
            <div class="card text-center" style="width: 18rem;">
                <div class="card-body">
                  <h5 class="card-title">Alevinaje</h5>
                  <p class="card-text">Entrada</p>
                  <p class="card-text">Salida</p>
                  <a href="../../views/v_alevinaje/v_guardar.php" class="btn btn-primary">Acceder</a>
                </div>
              </div>
            </div>

          <div class="col">
            <div class="card text-center" style="width: 18rem;">
                <div class="card-body">
                  <h5 class="card-title">Levante y engorde</h5>
                  <p class="card-text">Entrada de alevinos</p>
                  <p class="card-text">Salida pez gordo</p>
                  <a href="../../views/v_levante/v_guardar.php" class="btn btn-primary">Acceder</a>
                </div>
              </div>
          </div>

        </div>
        
        <div class="row">
            <div class="col">
                <div class="card text-center" style="width: 18rem;">
                    <div class="card-body">
                      <h5 class="card-title">Consumo de alimento</h5>
                      <p class="card-text">Tipo de alimento</p>
                      <p class="card-text">Pesaje de alimento</p>
                      <a href="../../views/v_consumo/v_guardar.php" class="btn btn-primary">Acceder</a>
                    </div>
                  </div>
            </div>
            <div class="col">
                <div class="card text-center" style="width: 18rem;">
                    <div class="card-body">
                      <h5 class="card-title">Biometría</h5>
                      <p class="card-text">Calculo biomasa - alimento</p>
                      <p>conversión</p>
                      <a href="../../views/v_biometria/v_muestreo.php" class="btn btn-primary">Acceder</a>
                    </div>
                  </div>    
            </div>
          </div>

          <div class="row">
            
            
            
          </div>

          <div class="row">
            
          <div class="col">
                <div class="card text-center" style="width: 18rem;">
                    <div class="card-body">
                      <h5 class="card-title">Costo lagos</h5>
                      <p class="card-text">Costo por lago</p>
                      <p class="card-text">Costo producción kilo pez</p>
                      <a href="../v_costos/v_costoLago.php" class="btn btn-primary">Acceder</a>
                    </div>
                  </div>

          </div>

          <div class="col">
                <div class="card text-center" style="width: 18rem;">
                    <div class="card-body">
                      <h5 class="card-title">Oxigenación</h5>
                      <p class="card-text">Medición</p>
                      <p class="card-text">Oxigeno por lago</p>
                      <a href="../v_oxigenacion/v_guardar.php" class="btn btn-primary">Acceder</a>
                    </div>
                 </div>
          </div>
      
    </div>

    <div class="row">
    
                   <div class="col" style="margin-left:142px">
                       <div class="card text-center" style="width: 18rem; margin-left:-128px">
                         <div class="card-body">
                            <h5 class="card-title">General</h5>
                            <p class="card-text">Reportes</p>
                            <p class="card-text">Detalles siembras</p>
                            <a href="../v_reportes/v_inicio.php" class="btn btn-primary">Acceder</a>
                         </div>
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

</body>
</html>