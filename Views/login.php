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
            <h5 class="card-title">Iniciar Sesión</h5>
                <form id="login-form" action="index.php?c=usuarios&a=login" method="post">
                    <div class="form-group">
                        <input type="" value="" name="email" class="form-control" placeholder="Email o Username" autofocus required>
                    </div>
                    <div class="form-group">
                        <input type="password" value="" name="password" class="form-control" placeholder="Contraseña" required>
                    </div>
                    <div class="form-group float-md-right">
                        <a href="index.php?c=usuarios&a=registrar" class="btn btn-primary">Registrarse</a>
                        <button type="submit" class="btn btn-success" name="save">Ingresar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include_once("./Views/includes/footer.php") ?>
