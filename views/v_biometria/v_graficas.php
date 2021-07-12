<?php
require('../../models/m_usuario/m_sesion.php');
$lago = $_GET['lago'];
$siembra = $_GET['siembra'];
require('../../models/m_graficasBiometria/m_lineal.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="Stylesheet" href="../../assets/bootstrap/css/bootstrap.min.css">
    <link rel="Stylesheet" href="../../assets/styles/admin.css">
    <link rel="Stylesheet" href="../../assets/icons/css/all.min.css">

    <title>Graficas biomatria</title>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
        <a class="navbar-brand" ><h5>Graficas</h5></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
        
          <li class="nav-item active">
            <a class="nav-link" href="./v_muestreo">Muestreo<span class="sr-only">(current)</span></a>
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
                <a class="dropdown-item" href="../../views/v_biometria/v_muestreo.php">Muestreo</a>
               
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="../../models/m_usuario/m_cerrarSesion.php">Cerrar sesión</a>

              </div>
            </div>

         </form>
       
        </div>
      </nav>


</head>
<body>
    
    
      <div class="container" style="margin-top: 90px">

          <div class="card">
                  <div class="card-header bg-info text-white">
                  <h6>Conversión <?php echo ' - Lago: ', $lago, ' - Siembra: ',$siembra?> </h6>
                  </div>
                  
                      <div class="card-body">
                          
                          <div id="lineal"></div>

                      </div>
          </div>
               

                <div class="card" style="margin-top: 20px">
                        <div class="card-header bg-info text-white">
                        <h6>Peso ganado <?php echo ' - Lago: ', $lago, ' - Siembra: ',$siembra,' - Peso(Kg) '?> </h6>
                        </div>
                    
                        <div class="card-body">
                            <div id="linealPeso"></div>
                        </div>

                </div>
                

                <div class="card" style="margin-top: 20px">
                        <div class="card-header bg-info text-white">
                        <h6>Biomasa <?php echo ' - Lago: ', $lago, ' - Siembra: ',$siembra,' - Peso(Kg) '?> </h6>
                        </div>
                    
                        <div class="card-body">
                            <div id="linealBiomasa"></div>
                        </div>

                </div>
                
      </div>

    <script src="../../assets/jquery/jquery-3.5.1.min.js"></script>
    <script src="../../assets/bootstrap/js/bootstrap.min.js"></script>

    <script src="../../assets/plotly/plotly-latest.min.js"></script>
   
<!-- Script para grafica conversión !-->
<script>


    function graficaLineal(json){

    var parsed = JSON.parse(json);
    var arr = [];

    for(var x in parsed){
        arr.push(parsed[x]);
    }
    return arr;
    }

    X = graficaLineal('<?php echo $datosX ?>');
    Y = graficaLineal('<?php echo $datosY ?>');

    var trace1 = {

    x: X,
    y: Y,
    type: 'scatter'
    };


    var data = [trace1];

    Plotly.newPlot('lineal', data);

</script>

<!-- Script para grafica de peso ganado !-->
<script>


    function graficaLineal(json){

    var parsed = JSON.parse(json);
    var arr = [];

    for(var x in parsed){
        arr.push(parsed[x]);
    }
    return arr;
    }

    X = graficaLineal('<?php echo $datosX ?>');
    Y = graficaLineal('<?php echo $kgGanado ?>');

    var trace1 = {

    x: X,
    y: Y,
    type: 'scatter'
    };


    var data = [trace1];

    Plotly.newPlot('linealPeso', data);

</script>

<!-- Script para grafica de biomasa !-->
<script>


    function graficaLineal(json){

    var parsed = JSON.parse(json);
    var arr = [];

    for(var x in parsed){
        arr.push(parsed[x]);
    }
    return arr;
    }

    X = graficaLineal('<?php echo $datosX ?>');
    Y = graficaLineal('<?php echo $jsonBiomasa ?>');

    var trace1 = {

    x: X,
    y: Y,
    type: 'scatter'
    };


    var data = [trace1];

    Plotly.newPlot('linealBiomasa', data);

</script>




</body>
</html>

