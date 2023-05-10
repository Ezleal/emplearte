<?php include_once("./Views/includes/header.php") ?> 
<?php include_once("./Views/includes/navigation.php") ?> 

<div class="container p-4">
    <div class="row d-flex justify-content-center">
        <div class="col-md-4 mx-auto">
        <?php if (isset($_SESSION['message'])) { ?>
            <div class="alert alert-<?= $_SESSION['style']?> alert-dismissible fade show" role="alert">
                <?= $_SESSION['message']?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
         <?php session_unset(); } ?>
            <div class="card card-body" id="form_alta">
            <h5 class="card-title">Registrarse</h5>
                <form id="register-form" action="index.php?c=usuarios&a=registrar" method="post">
                   
                    <div class="form-group">
                        <input type="text" value="" name="nombre" class="form-control" placeholder="Nombre" autofocus required>
                    </div>
                    <div class="form-group">
                        <input type="text" value="" name="apellido" class="form-control" placeholder="Apellido" required>
                    </div>
                    <div class="form-group">
                        <input type="text" value="" name="email" class="form-control" placeholder="Email" autofocus required>
                    </div>
                    <div class="form-group">
                        <input type="username" value="" name="username" class="form-control" placeholder="Username" required>
                    </div>
                    <div class="form-group">
                        <input type="password" value="" name="password" class="form-control" placeholder="Contraseña" required>
                    </div>
                    <div class="form-group float-md-right">
                        <a href="index.php?c=usuarios&a=login" class="btn btn-primary">Cancelar</a>
                        <button type="submit" class="btn btn-success" name="save">Registrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?php include_once("./Views/includes/footer.php") ?>
