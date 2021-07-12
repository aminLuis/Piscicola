<?php
require('../../models/m_usuario/m_sesion.php');
require('../../config/connect.php');
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

    <title>Editar datos empresa</title>
</head>
<body>

      <div class="edit">
         
           <div class="container">
              <h5>Datos actuales</h5>

              <form method="POST" action="../../models/m_empresa/m_actualizar.php">
                            
                              <br>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Nombre empresa</label>
                                    <div class="col-sm-10">
                                    <input type="text" name="nombre" class="form-control" id="inputEmail3" value="<?php echo $rowEmpresa['nombre'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Dirección</label>
                                    <div class="col-sm-10">
                                    <input type="text" name="direccion" class="form-control" id="inputPassword3" value="<?php echo $rowEmpresa['direccion'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                    <input type="email" name="email" class="form-control" id="inputPassword3" value="<?php echo $rowEmpresa['email'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Teléfono</label>
                                    <div class="col-sm-10">
                                    <input type="number" name="telefono" class="form-control" id="inputPassword3" value="<?php echo $rowEmpresa['telefono'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">NIT</label>
                                    <div class="col-sm-10">
                                    <input type="text" name="nit" class="form-control" id="inputPassword3" value="<?php echo $rowEmpresa['nit'] ?>" readonly>
                                    </div>
                                </div>

                                <button class="btn btn-success" style="margin-top:30px">Guardar cambios</button>
                          
                          </form>

                          <button class="btn btn-danger" style="width:147px" onclick="history.go(-1)">Cancelar</button>

           </div>
         
      </div>
    
</body>
</html>