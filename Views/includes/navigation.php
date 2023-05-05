<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="index.php">EmpleARTE</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse ml-4 mt-3" id="navbarNav">
      <?php if(isset($_COOKIE['usuario'])) {?>
      <ul class="navbar-nav ml-auto order-lg-2 mb-3">
        <li class="nav-item">
          <a class="nav-link" href="index.php?c=empleados&a=index">Alta de usuarios</a>
          <a class="nav-link sobre-nosotros" href="index.php?c=nosotros&a=index">Sobre nosotros</a>
        </li>
        <li class="nav-item ml-auto mt-4 ml-2">
            <button type="submit" class="btn btn-link nav-link btn-warning" id="exit">Logout</button>
        </li>
      </ul>
    </div>
    <?php } ?>

  </div>
</nav>
