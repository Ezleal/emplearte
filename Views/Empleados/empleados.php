
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

            <div class="card card-body" id="form_alta">
            <h5 class="card-title">Alta de Empleado</h5>
                <form action="index.php?c=empleados&a=save" method="post" >
                    <div class="form-group">
                        <input type="number" value="" name="IdLegajo" class="form-control" placeholder="Nro. de Legajo" autofocus required>
                    </div>
                    <div class="form-group">
                        <input type="text" value="" name="Apellido" class="form-control" placeholder="Apellido" required>
                    </div>
                    <div class="form-group">
                        <input type="text" value="" name="Nombre" class="form-control" placeholder="Nombre" required>
                    </div>
                    <div class="form-group">
                        <input type="text" value="" name="Direccion" class="form-control" placeholder="Direccion" required>
                    </div>
                    <div class="form-group">
                        <input type="text" value="" name="Localidad" class="form-control" placeholder="Localidad" required>
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="ID_TIPO_DOCUMENTO" required>
                            <option value="" selected disabled>Tipo Documento</option>
                            <?php  
                                foreach($tipoDoc as $tipo) { 
                                echo $tipo;
                                } 
                            ?>   
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="number" value="" name="NroDocumento" class="form-control" placeholder="Nro de Documento" required>
                    </div>
                    <div class="form-group">
                        <input type="number" value="" name="CodPostal" class="form-control" placeholder="Codigo Postal" required>
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="ID_PROVINCIA" required>
                            <option value="" selected disabled>Provincia</option>
                            <?php  
                                foreach($provincias as $provincia) { 
                                echo $provincia;
                                } 
                            ?>  
                        </select>
                    </div>
                    <div class="form-group float-md-right">
                        <button type="button" class="btn btn-danger" id="cancelarIndex">Volver</button>                 
                        <button type="submit" class="btn btn-success" name="save">Alta</button>
                    </div>

                </form>
            </div>
        </div>

        <div class="col-md-8" id="lista">
            <table class="table table-bordered">

                    <?php
                    if(!is_array($empleados)){
                        echo "<b>$empleados</b>";
                    }
                    else{?>
                        <thead>
                        <tr>
                            <th>N° Legajo</th>
                            <th>Nombre Completo</th>
                            <th>Direccion</th>
                            <th>Documento</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                    
                    <?php foreach($empleados as $empleado) { ?>
                    <tr>
                        <td><?php echo $empleado['IdLegajo']; ?></td>
                        <td><?php echo $empleado['Nombre'] .' '. $empleado['Apellido']; ?></td>
                        <td><?php echo $empleado['Localidad'].','. $empleado['PROVINCIA']; ?></td>
                        <td><?php echo $empleado['DESC_DOCUMENTO'].': '. $empleado['NroDocumento']; ?></td>
                        <td>
                        <a href="index.php?c=empleados&a=modificar&IdLegajo=<?php echo $empleado['IdLegajo']?>" class="btn btn-primary">
                            <i class="far fa-edit"></i>
                        </a>
                        <a href="index.php?c=empleados&a=delete&IdLegajo=<?php echo $empleado['IdLegajo']?>" class="btn btn-danger">
                            <i class="far fa-trash-alt"></i>
                        </a>
                        </td>
                    </tr>
                    <?php }}?>
                    </tbody>
                </table>
        </div>
    </div>

</div>

<?php include_once("./Views/includes/footer.php") ?>
