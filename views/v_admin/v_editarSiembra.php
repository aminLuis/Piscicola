<?php
require('../../models/m_usuario/m_sesion.php');
//require('../../models/m_general/m_noAutorizado.php');
$codigo = $_GET['codigo'];
require('../../controllers/c_admin/c_cargarSiembra.php');
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
               
               <form method="POST" action="../../models/m_admin/m_actualizarSiembra.php?codigo=<?php echo $row['codigo'] ?>">

                    <div class="row">
                                <div class="col">
                                <label>Ingrese siembra</label>
                                <input type="text" class="form-control" placeholder="Ejemplo: S1" name="siembra" value="<?php echo $row['siembra'] ?>" required>
                                </div>

                                <div class="col">
                            <label>Estado</label>
                            <select name="estado" class="form-control">
                                <?php
                                if($row['estado']){
                                ?>
                                <option>ACTIVA</option>
                                <option>NO ACTIVA</option>
                                <?php
                                }else{
                                ?>
                                <option>NO ACTIVA</option>
                                <option>ACTIVA</option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                               
                    </div>

                    <div class="row">
      
                                <div class="col">
                                <label>Area total en producción</label>
                                <input type="number" class="form-control" step="any" name="area" value="<?php echo $row['area'] ?>" required>
                                </div>

                                <div class="col">
                                <label>Fecha creación</label>
                                <input type="date" class="form-control" name="fecha" required value="<?php echo $row['fecha'] ?>">
                                </div>

                    </div>

                            <button class="btn btn-primary" style="margin-top:30px">Guardar cambios</button>

               </form>

               <a href="./v_configuracion.php">
                   <button class="btn btn-danger" style="width:147px">Cancelar</button>
               </a>

           </div>

     </div>

</body>
</html>