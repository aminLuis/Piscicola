<?php
require('../../models/m_usuario/m_sesion.php');
require('../../models/m_general/m_noAutorizado.php');
require('../../controllers/c_admin/c_cargarCostoFijo.php');
require('../../models/m_general/m_listarSiembras.php');
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

           <form method="POST" action="../../models/m_admin/m_editarCostoFijo.php?codigo=<?php echo $row['codigo'] ?>">

                    <div class="row">

                        <div class="col">
                            <label>Siembra</label>
                            <select name="siembra" class="form-control" required>
                                <option> <?php echo $row['siembra'] ?> </option>
                                <?php
                                foreach($siembras as $siembra){
                                    if($row['siembra']!=$siembra){
                                ?>
                                <option> <?php echo $siembra ?> </option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>

                        <div class="col">
                            <label>Nomina fija</label>
                            <input type="number" class="form-control" step="any" name="nomina" value="<?php echo $row['nomina'] ?>" required>
                        </div>

                        <div class="col">
                            <label>Asistencia técnica</label>
                            <input type="number" class="form-control" step="any" name="asistencia" value="<?php echo $row['asistencia'] ?>" required>
                        </div>

                    </div>

                    <div class="row">

                        <div class="col">
                        <label>Jornales muestras</label>
                        <input type="number" class="form-control" step="any" name="jornales" value="<?php echo $row['jornales'] ?>" required>
                        </div>

                        <div class="col">
                        <label>Combustible</label>
                        <input type="number" class="form-control" step="any" name="combustible" value="<?php echo $row['combustible'] ?>" required>
                        </div>

                        <div class="col">
                        <label>Tiros</label>
                        <input type="number" class="form-control" step="any" name="tiros" value="<?php echo $row['tiros'] ?>" required>
                        </div>

                    </div>

                    <div class="row">

                        <div class="col">
                        <label>Energia</label>
                        <input type="number" class="form-control" step="any" name="energia" value="<?php echo $row['energia'] ?>" required>
                        </div>

                        <div class="col">
                            <label>Fecha</label>
                            <input type="date" class="form-control" name="fecha" value="<?php echo $row['fecha'] ?>" required>
                        </div>

                        <div class="col"></div>

                    </div>

                    <button class="btn btn-primary" style="margin-top:30px">Guardar cambios</button>

           </form>

             <a href="./v_costoSiembra.php">
                 <button class="btn btn-danger" style="width:147px">Cancelar</button>
             </a>

        </div>

    </div>

</body>
</html>