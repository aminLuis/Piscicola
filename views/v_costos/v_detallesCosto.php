<?php
require('../../models/m_usuario/m_sesion.php');
$la = $_GET['lago'];
$siembra = $_GET['siembra'];
require('../../controllers/c_costo/c_calcularCostos.php');
require('../../controllers/c_costos/c_cargarCosto.php');
require('../../controllers/c_costos/c_cargarCostoCod.php');

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


    <title>Detalles costo</title>
</head>
<body>
    
<div class="edit" style="height: 750px">
                  <h5>Detalles costo</h5>
              <div class="container">

            
                  <hr>
                     <div class="row">

                        <div class="col">
                        <label>Lago</label>
                        <input type="text" class="form-control" name="lago" value="<?php echo $la ?>" readonly>
                        </div>
                        <div class="col">
                        <label>Siembra</label>
                        <input type="text" class="form-control" name="siembra" value="<?php echo $siembra ?>" readonly>
                        </div>


                     </div>
                      <hr>
                    <div class="row">

                          <div class="col">

                               <label>Alimento + Flete</label>
                               <input type="number" class="form-control" name="alimento" value="<?php echo $total ?>" readonly>

                          </div>

                          <div class="col">
                              <label>Alevino</label>
                               <input type="number" class="form-control" name="alevino" value="<?php echo $row['alevino'] ?>" readonly>
                          </div>

                          <div class="col">
                              <label>Bacteria</label>
                               <input type="number" class="form-control" name="bacteria" value="<?php echo $row['bacteria'] ?>" readonly>
                          </div>

                          
                          <div class="col">
                              <label>Energia</label>
                               <input type="number" class="form-control" name="energia" value="<?php echo $energia ?>" readonly>
                          </div>

                    </div>

                    <div class="row">

                        <div class="col">
                            <label>Nomina</label>
                            <input type="number" class="form-control" name="nomina" value="<?php echo $personalFijo ?>" readonly>
                        </div>

                        <div class="col">
                            <label>Asistencia técnica</label>
                            <input type="number" class="form-control" name="asistencia" value="<?php echo $asistencia ?>" readonly>
                        </div>

                        <div class="col">
                            <label>Jornales</label>
                            <input type="number" class="form-control" name="jornales" value="<?php echo $jornales ?>" readonly>
                        </div>

                        <div class="col">
                            <label>Proceso</label>
                            <input type="number" class="form-control" name="proceso" value="<?php echo $row['proceso'] ?>" readonly>
                        </div>

                    </div>

                    <div class="row">

                        <div class="col">
                            <label>Insumo</label>
                            <input type="number" class="form-control" name="insumo" value="<?php echo $row['insumo'] ?>" readonly>
                        </div>

                        <div class="col">
                            <label>Combustible</label>
                            <input type="number" class="form-control" name="combustible" value="<?php echo $combustible ?>" readonly>
                        </div>

                        <div class="col">
                            <label>Chinchorro</label>
                            <input type="number" class="form-control" name="chinchorro" value="<?php echo $row['chinchorro'] ?>" readonly>
                        </div>

                        
                        <div class="col">
                            <label>Hielo</label>
                            <input type="number" class="form-control" name="hielo" value="<?php echo $row['hielo'] ?>" readonly>
                        </div>

                    </div>

                    <div class="row">

                        <div class="col">
                            <label>Tiros</label>
                            <input type="number" class="form-control" name="tiros" value="<?php echo $tiros ?>" readonly>
                        </div>

                        <div class="col">
                            <label>Dep. equipos</label>
                            <input type="number" class="form-control" name="equipos" value="<?php echo $row['depEquipos'] ?>" readonly>
                        </div>

                        <div class="col">
                        <label>Otros</label>
                        <input type="number" class="form-control" step="any" name="otro" value="<?php echo $row['otro'] ?>" readonly>
                        </div>

                        <div class="col">
                        <label>Fecha</label>
                        <input type="date" class="form-control" name="fecha" value="<?php echo $row['fecha'] ?>" readonly>
                        </div>

                       

                    </div>
                        <a href="./v_costoLago.php">
                          <button class="btn btn-primary" style="margin-top:30px; width:147px;">Salir</button>
                        </a>    
                  
                       <?php
                        if($varSesion['tipo']=='admin' || $varSesion['tipo']=='root'){
                       ?>
                        <a href="./v_editarCosto.php?lago=<?php echo $la ?>&siembra=<?php echo $siembra ?>">
                          <button class="btn btn-warning" style="margin-top:30px;width:147px">Editar</button>
                        </a>

                        <?php
                        }
                        ?>
                         
                       
              </div>

     </div>


    <script src="../../assets/jquery/jquery-3.5.1.min.js"></script>
    <script src="../../assets/bootstrap/js/bootstrap.min.js"></script> 

</body>
</html>