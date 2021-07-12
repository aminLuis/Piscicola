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

    <title>Eliminar datos empresa</title>
</head>
<body>


  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h5 class="modal-title text-white">Advertencia</h5>
       
      </div>
      <div class="modal-body">

      <br>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Nombre</label>
                                    <div class="col-sm-10">
                                    <input type="text" name="nombre" class="form-control" id="inputEmail3" value="<?php echo $rowEmpresa['nombre'] ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Dirección</label>
                                    <div class="col-sm-10">
                                    <input type="text" name="direccion" class="form-control" id="inputPassword3" value="<?php echo $rowEmpresa['direccion'] ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                    <input type="email" name="email" class="form-control" id="inputPassword3" value="<?php echo $rowEmpresa['email'] ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Teléfono</label>
                                    <div class="col-sm-10">
                                    <input type="number" name="telefono" class="form-control" id="inputPassword3" value="<?php echo $rowEmpresa['telefono'] ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">NIT</label>
                                    <div class="col-sm-10">
                                    <input type="text" name="nit" class="form-control" id="inputPassword3" value="<?php echo $rowEmpresa['nit'] ?>" readonly>
                                    </div>
                                </div>

            <hr>
               <p>El regitro será eliminado permanentemente.</p>
               <p>¿Desea continuar con la acción?</p>
            <hr>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
      
        <a href="../../models/m_empresa/m_eliminar.php?nit=<?php echo $rowEmpresa['nit'] ?>">
          <button type="button" class="btn btn-success">Continuar</button>
        </a>
      
      </div>
    </div>
  </div>

    
</body>
</html>