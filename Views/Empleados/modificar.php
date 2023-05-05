<?php include_once("./Views/includes/header.php") ?> 
<?php include_once("./Views/includes/navigation.php") ?> 

<div class="container p-4">
    <div class="row">

        <div class="col-md-4">
            <?php if (isset($_SESSION['message'])) { ?>
                <div class="alert alert-<?= $_SESSION['style']?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message']?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php session_unset(); } ?>

            <div class="card card-body" id="form_modif">
                <h5 class="card-title">Modificar Empleado</h5>
                <form action="index.php?c=empleados&a=update" method="post" >
                    <div class="form-group">
                        <label for="IdLegajo">Nro. de Legajo:</label>
                        <input type="number" value="<?= $empleado['IdLegajo'] ?>" name="IdLegajo" id="IdLegajo" class="form-control" placeholder="Nro. de Legajo" autofocus readonly>
                    </div>
                    <div class="form-group">
                        <label for="Apellido">Apellido:</label>
                        <input type="text" value="<?= $empleado['Apellido'] ?>" name="Apellido" id="Apellido" class="form-control" placeholder="Apellido" required>
                    </div>
                    <div class="form-group">
                        <label for="Nombre">Nombre:</label>
                        <input type="text" value="<?= $empleado['Nombre'] ?>" name="Nombre" id="Nombre" class="form-control" placeholder="Nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="Direccion">Direccion:</label>
                        <input type="text" value="<?= $empleado['Direccion'] ?>" name="Direccion" id="Direccion" class="form-control" placeholder="Direccion" required>
                    </div>
                    <div class="form-group">
                        <label for="Localidad">Localidad:</label>
                        <input type="text" value="<?= $empleado['Localidad'] ?>" name="Localidad" id="Localidad" class="form-control" placeholder="Localidad" required>
                    </div>
                    <div class="form-group">
                        <label for="ID_TIPO_DOCUMENTO">Tipo Documento:</label>
                        <select class="form-control" name="ID_TIPO_DOCUMENTO" id="ID_TIPO_DOCUMENTO" required>
                            <option value="" selected disabled>Tipo Documento</option>
                            <?php foreach($tipoDoc as $tipo) { 
                                echo $tipo;
                            } ?>   
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="NroDocumento">Nro. Documento:</label>
                        <input type="number" value="<?= $empleado['NroDocumento'] ?>" name="NroDocumento" class="form-control" placeholder="Nro de Documento" required>
                    </div>
                    
                    <div class="form-group">
                         <label for="CodPostal">Codigo Postal:</label>
                        <input type="number" value="<?= $empleado['CodigoPostal'] ?>" name="CodPostal" class="form-control" placeholder="Codigo Postal" required>
                    </div>
                    <div class="form-group">
                        <label for="ID_PROVINCIA">Provincia:</label>
                        <select class="form-control" name="ID_PROVINCIA" required>
                            <option value="" selected disabled>Provincia</option>
                            <?php foreach($provincias as $provincia) { 
                                echo $provincia;
                            } ?>  
                        </select>
                    </div>
                    <div class="form-group float-md-right">
                        <button type="button" class="btn btn-danger" id="cancelar">Cancelar</button>                 
                        <button type="submit" class="btn btn-success" name="update">Guardar</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>

<?php include_once("./Views/includes/footer.php") ?>
