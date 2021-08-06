<?php
require('../../models/m_usuario/m_sesion.php');
$siembra = $_POST['siembra'];
require('../../controllers/c_reportes/c_reporteSiembra.php');
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

    <title>Reporte siembra</title>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
        <a class="navbar-brand" >
       
        Reporte-siembra
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
                <a class="dropdown-item" href="./v_inicio.php">Inicio reportes</a>
                <a class="dropdown-item" href="./v_seleccionSiembra.php">Seleccionar otra</a>
            
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
        <h5>Reporte siembra: <?php echo $siembra ?></h5>
      </div>

      <div class="container">
      
            <div class="alert alert-danger">
                  <h6>Alevinaje</h6>
                  <hr>
                  <ul class="list-group">

                    <li class="list-group-item list-group-item-info">

                       <table class="table table-hover">
                          <thead>
                             <tr>
                                <th>Lago</th>
                                <th>Animal</th>
                                <th>Fecha siembra</th>
                                <th>Ingresaron</th>
                                <th>Salieron</th>
                                <th>Sobrevivencia (%)</th>
                                <th>Mortandad (%)</th>
                                <th>consumo (KG)</th>
                             </tr>
                          </thead>
                          <tbody>
                            <?php 
                               foreach($queryAlevinaje as $rowAlevinaje){
                                 $salieron = $rowAlevinaje['cantidad'] - $rowAlevinaje['saldo'];
                                 $sobrevivencia = ($salieron * 100)/$rowAlevinaje['cantidad'];
                                 $mortandad = 100 - $sobrevivencia;
                                 $consumo = 0;
                                  foreach($queryConsumo as $rowConsumo){
                                     if($rowAlevinaje['lago']==$rowConsumo['lago']){
                                          $consumo = $consumo + $rowConsumo['kilos'];
                                     }
                                  }
                            ?> 
                             <tr>
                                <td> <?php echo $rowAlevinaje['lago'] ?> </td>
                                <td> <?php echo $rowAlevinaje['animal'] ?> </td>
                                <td> <?php echo $rowAlevinaje['fecha'] ?> </td>
                                <td> <?php echo number_format($rowAlevinaje['cantidad'],1,",",".") ?> </td>
                                <td> <?php echo number_format($salieron,1,",",".") ?> </td>
                                <td> <?php echo $sobrevivencia ?> </td>
                                <td> <?php echo $mortandad ?> </td>
                                
                                <td> 
                                    <a href="./v_detalleConsumo.php?siembra=<?php echo $siembra?>&lago=<?php echo $rowAlevinaje['lago'] ?>">
                                      <?php echo number_format($consumo,1,",",".") ?>
                                    </a> 
                                </td>
                             
                             </tr>
                             
                             <?php
                               }
                             ?>
                          </tbody>
                       </table>

                    </li>

                   <li class="list-group-item list-group-item-info">
                       
                       <h6>Total consumo alevinaje: <?php echo number_format($totalConsumoAlevinaje,1,",",".") ?> KG</h6>

                    </li>
                  
                  </ul>
            </div>

            <div class="alert alert-success">
                  <h6>Levante y engorde</h6>
                  <hr>
                  <ul class="list-group">

                    <li class="list-group-item list-group-item-info">
                      
                        <table class="table table-hover">
                             <thead>
                                 <tr>
                                     <th>Lago</th>
                                     <th>Animal</th>
                                     <th>Fecha ingreso</th>
                                     <th>Ingresaron</th>
                                     <th>Salieron</th>
                                     <th>Sobrevivencia (%)</th>
                                     <th>Mortandad (%)</th>
                                     <th>Consumo (KG)</th>
                                 </tr>
                             </thead>

                             <tbody>
                             <?php

                               foreach($querySalida as $rowSalida){
                                 $salieron = $rowSalida['cantidad'] - $rowSalida['saldo'];
                                 $sobrevivencia = ($salieron * 100)/$rowSalida['cantidad'];
                                 $mortandad = 100 - $sobrevivencia;
                                 $consumo = 0;
                                 foreach($queryConsumo as $rowConsumo){
                                   if($rowSalida['lago']==$rowConsumo['lago']){
                                     $consumo = $consumo + $rowConsumo['kilos'];
                                   }
                                 }
                             ?>
                                 <tr>
                                    <td> <?php echo $rowSalida['lago'] ?> </td>
                                    <td> <?php echo $rowSalida['animal'] ?> </td>
                                    <td> <?php echo $rowSalida['fecha'] ?> </td>
                                    <td> <?php echo number_format($rowSalida['cantidad'],1,",",".") ?> </td>
                                    <td> <?php echo number_format($salieron,1,",",".") ?> </td>
                                    <td> <?php echo $sobrevivencia ?> </td>
                                    <td> <?php echo $mortandad ?> </td>
                                    
                                    <td>
                                        <a href="./v_detalleConsumo.php?siembra=<?php echo $siembra?>&lago=<?php echo $rowSalida['lago'] ?>">
                                          <?php echo number_format($consumo,1,",",".") ?>
                                        </a> 
                                    </td>
                                
                                 </tr>
                                 <?php
                               }
                                 ?>
                             </tbody>
                        </table>

                    </li>

                   
                    <li class="list-group-item list-group-item-info">
                    <h6>Carne producida</h6>

                         <table class="table table-hover">
                            <thead>
                               <thead>
                                    <tr>
                                        <th>Lago</th>
                                        <th>Animal</th>
                                        <th>Total carne producida</th>
                                        <th>Peso promedio</th>
                                        <th>Costo producción</th>
                                        <th>Costo kilo</th>
                                        <th>Recaudo</th>
                                        <th>Utilidad</th>
                                    </tr>
                               </thead>
                            </thead>

                            <tbody>
                            <?php
                              foreach($querySalida as $rowSalida){
                                $totalCarne = 0;
                                $pesoPromedio = 0;
                                $unidades = 0;
                                $costo = 0;
                                $costoKilo = 0;
                                $recaudo = 0;
                               foreach($queryLevante as $rowLevante){
                                    if($rowSalida['lago']==$rowLevante['lago']){
                                         $totalCarne = $totalCarne + $rowLevante['kilogramos'];
                                         $unidades = $unidades + $rowLevante['unidades'];
                                         $recaudo = $recaudo + ($rowLevante['kilogramos']*$rowLevante['precio']);
                                    }
                                }
                               
                                if($unidades>0 && $totalCarne>0){
                                  $pesoPromedio = $totalCarne/$unidades;
                                }

                               
                                foreach($queryCostosTotales as $rowCostosTotales){
                                  if($rowSalida['lago']==$rowCostosTotales['lago']){
                                    $costo = $rowCostosTotales['total'];
                                    $costoKilo = $rowCostosTotales['costoKilo'];
                                  }
                                }

                                $utilidad = 0;
                                $utilidad = $recaudo - $costo;

                            ?>
                               <tr>
                                   <td> <?php echo $rowSalida['lago'] ?> </td>
                                   <td> <?php echo $rowSalida['animal'] ?> </td>
                                   <td> <?php echo number_format($totalCarne,1,",",".") ?> </td>
                                   <td> <?php echo $pesoPromedio ?> </td>
                                   <td> <?php echo number_format($costo,1,",",".") ?> </td>
                                   <td> <?php echo number_format($costoKilo,1,",",".") ?> </td>
                                   <td> <?php echo number_format($recaudo,1,",",".") ?> </td>
                                   <td> <?php echo number_format($utilidad,1,",",".") ?> </td>
                               </tr>
                               <?php
                              }
                               ?>
                            </tbody>
                         </table>

                    </li>

                    <li class="list-group-item list-group-item-info">
                    <h6>Total consumo levante: <?php echo number_format($totalConsumoLevante,1,",",".") ?> KG</h6>

                    </li>
                  
                  </ul>

                  
            </div>

            <div class="alert alert-dark">

              <ul class="list-group">
                    
                    <li class="list-group-item list-group-item-info">
                       <h5>Totales</h5>
                       <h6>Total consumo alimento siembra: <?php echo number_format($totalConsumo,1,",",".") ?></h6>
                       <h6>Total costo siembra: <?php echo number_format($totalCostoSiembra,1,",",".") ?></h6>
                       <h6>Total recaudo siembra: <?php echo number_format($totalRecaudoSiembra,1,",",".") ?></h6>
                       <h6>Utilidad siembra: <?php echo number_format($utilidadSiembra,1,",",".") ?></h6>
                    </li>

                </ul>

            </div>
      
      </div>
     
     </div>

   </div>  



    <script src="../../assets/jquery/jquery-3.5.1.min.js"></script>
    <script src="../../assets/bootstrap/js/bootstrap.min.js"></script> 
</body>
</html>