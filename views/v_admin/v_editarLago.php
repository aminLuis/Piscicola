<?php
require('../../models/m_usuario/m_sesion.php');
//require('../../models/m_general/m_noAutorizado.php');
$codigo = $_GET['codigo'];
require('../../models/m_general/m_lagos.php');
require('../../controllers/c_admin/c_cargarLago.php');
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

    <title>Editar registro</title>
</head>
<body>
    
    <div class="edit">
      <h5>Datos actuales</h5>
         <div class="container">
  
         <form method="POST" action="../../models/m_admin/m_actualizarLago.php?codigo=<?php echo $row['codigo'] ?>">

                    <div class="row">

                        <div class="col">
                        <label>Lago</label>
                        <select name="la" class="form-control" readonly>
                            <option> <?php echo $row['lag'] ?> </option>
                        </select>
                        </div>

                        <div class="col">
                            <label>Area del lago</label>
                            <input type="number" class="form-control" step="any" name="area" required value="<?php echo $row['area'] ?>">
                        </div>

                    </div>

                    <button class="btn btn-primary" style="margin-top:30px">Guardar cambios</button>

         </form>

            <a href="./v_lagos.php">
             <button class="btn btn-danger" style="width: 147px">Cancelar</button>
            </a>
         </div>

    </div>


    <script src="../../assets/jquery/jquery-3.5.1.min.js"></script>  
    <script src="../../assets/bootstrap/js/bootstrap.min.js"></script>

</body>
</html>