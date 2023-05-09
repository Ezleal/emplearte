<?php include_once("./Views/includes/header.php") ?> 
<?php include_once("./Views/includes/navigation.php") ?> 

<div class="container p-4">
    <div class="row d-flex justify-content-center">
        <div class="col-md-4 mx-auto">
            <div class="card card-body" id="form_alta">
            <h5 class="card-title">Registrarse</h5>
                <form id="login-form" action="index.php?c=usuarios&a=login" method="post">
                    <div class="form-group">
                        <input type="" value="" name="email" class="form-control" placeholder="Email" autofocus required>
                    </div>
                    <div class="form-group">
                        <input type="password" value="" name="password" class="form-control" placeholder="Contraseña" required>
                    </div>
                    <div class="form-group float-md-right">
                        <a href="index.php?c=usuarios&a=login" class="btn btn-primary">Cancelar</a>
                        <button onclick="registrar()" class="btn btn-success" name="save">Registrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?php include_once("./Views/includes/footer.php") ?>
