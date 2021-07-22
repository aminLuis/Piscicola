<?php
require('../../models/m_usuario/m_sesion.php');
$codigoInterno = $_GET['codigoInterno'];
require('../../controllers/c_alevinaje/c_cargarRegistro.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="Stylesheet" href="../../assets/bootstrap/css/bootstrap.min.css">
    <link rel="Stylesheet" href="../../assets/styles/alevinaje.css">
    <link rel="Stylesheet" href="../../assets/icons/css/all.min.css">

    <title>Editar registro</title>
</head>
<body>
    

<div class="edit">
         <div class="container">
            <h5>Datos actuales</h5>
          <br>
         <form method="POST" action="../../models/m_alevinaje/m_actualizarRegistro.php?codigoInterno=<?php echo $row['codigoInterno'] ?>">
               
                <div class="row">
                
                        <div class="col">
                           <label>Cantidad de alevinos a salir</label>
                           <input type="text" class="form-control" name="cantidad" value="<?php echo $row['cantidad'] ?>" required>
                       </div>

                       <div class="col">
                                    <label>Siembra</label>
                                    <select name="siembra"  class="form-control" readonly>
                                       <option> <?php echo $row['siembra'] ?> </option>
                                      
                                    </select>
                       </div>

                       

                </div>

                <div class="row">
                   
                    <div class="col">
                    <label>Lago de engorde</label>
                      <select name="lagoEngorde" class="form-control" readonly>
                             <option> <?php echo $row['lagoEngorde'] ?> </option>
                      </select>
                    </div>
             
                    <div class="col">
                    <label>Lago de alevinaje</label>
                      <select name="lago" class="form-control" readonly>
                             <option> <?php echo $row['lago'] ?> </option>
                      </select>
                    </div>
                     
                   

                </div>
              
                <div class="row">
                    
                    
                    
                    <div class="col"></div>
                    <div class="col"></div>
                
                   
                </div>
                   <hr>
                <div class="row">
                    
              
                    <div class="col"></div>

                </div>

                    <button class="btn btn-primary" style="margin-top:30px">Guardar cambios</button>

            </form>

            <button class="btn btn-danger" style="width:147px" onclick="history.go(-1)">Cancelar</button>
           
         </div>
    </div>


</body>
</html>