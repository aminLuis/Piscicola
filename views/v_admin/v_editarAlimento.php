<?php
require('../../models/m_usuario/m_sesion.php');
//require('../../models/m_general/m_noAutorizado.php');
$codigo = $_GET['codigo'];
require('../../controllers/c_admin/c_editarAlimento.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="Stylesheet" href="../../assets/bootstrap/css/bootstrap.min.css">
    <link rel="Stylesheet" href="../../assets/styles/alevinaje.css">
   
    <title>Editar registro</title>
</head>
<body>

     <div class="edit">

          <h5>Datos actuales</h5>

             <div class="container">

                    <form method="POST" action="../../models/m_admin/m_actualizarAlimento.php?codigo=<?php echo $row['codigo'] ?>">

                                    <div class="row">

                                        <div class="col">
                                        <label>Tipo de alimento</label>
                                        <input type="text" name="tipo" class="form-control" value="<?php echo $row['tipo'] ?>" required>
                                        </div>

                                        <div class="col">
                                        <label>Total kilos (Kg)</label>
                                        <input type="number" name="kilos" class="form-control" value="<?php echo $row['kilos'] ?>" required>
                                        </div>

                                        <div class="col">
                                        <label>Costo kilogramo</label>
                                        <input type="number" step="any" name="precio" class="form-control" value="<?php echo $row['precio'] ?>" required>
                                        </div>

                                    </div>

                                    <div class="row">

                                        <div class="col">
                                        <label>Fecha</label>
                                        <input type="date" name="fecha" class="form-control" value="<?php echo $row['fecha'] ?>" required>
                                        </div>

                                         <div class="col">
                                         <label>Costo flete</label>
                                         <input type="number" name="flete" step="any" class="form-control" value="<?php echo $row['flete'] ?>" required>  
                                         </div>

                                         <div class="col"></div>

                                    </div>
                                        
                                        

                                        

                                    <button class="btn btn-primary" style="margin-top: 30px">Guardar cambios</button>

                    </form>
                      <a href="./v_alimentos.php">
                      <button class="btn btn-danger" style="width:145px">Cancelar</button>
                      </a>

             </div>

     </div>
    
</body>
</html>