<!DOCTYPE html>
<html lang="es">

<head>
  <title>GSF Framework</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <style>
    .fakeimg {
      height: 200px;
      background: #aaa;
    }
  </style>
</head>

<body>

  <nav class="navbar navbar-expand-sm bg-primary navbar-dark">
    <a class="navbar-brand" href="#">GSF Framewoks</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="#">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Nosotros</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contacto</a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url(); ?>/Dashboard">Administrar</a>
        </li>
      </ul>
    </div>
  </nav>

  <div class="container" style="margin-top:30px">
    <div class="row">
      <div class="col-sm-12">
        <h2>Como realizar este Framework</h2>
        <h5>En este curso aprenderas como realizar este frameworks para realizar aplicaciones mas complejas, Mayo 31, 2021</h5>
        <div class=""><img class="img-fluid" src="<?php echo media(); ?>/img/baner.jpg" alt=""></div>
        <p>Suscribete para aprender más.</p>
        <p>Con este curso aprenderemos como realizar un framework con las mejores practicas usando la arquictectura MVC. con POO.</p>
      </div>
    </div>
  </div>

  <div class="jumbotron text-center" style="margin-bottom:0">
    <p>Luis Gonzalez WEB</p>
  </div>

</body>

</html>