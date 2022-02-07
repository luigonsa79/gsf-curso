<!doctype html>
<html lang="<?= SITE_LANG ?>">

<head>
  <?= get_favicon(); ?>
  <meta charset="<?= SITE_CHARSET ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="<?= SITE_DESC ?>">
  <meta name="author" content="GSF curso">
  <meta name="generator" content="<?= SITE_VERSION ?>">
  <title><?= SITE_NAME ?></title>

  <!-- Bootstrap -->
  <link href="<?= CSS ?>/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="<?= FONTS ?>/css/font-awesome.min.css" rel="stylesheet">
  <!-- plugins -->
  <link href="<?= PLUGINS ?>/noty/noty.css" rel="stylesheet">

  <link href="<?= CSS ?>/signin.css" rel="stylesheet">
</head>

<body class="text-center">

  <form id="formRegister" class="form-signin" novalidate method="POST">
    <img class="mb-4" src="<?= get_logo() ?>" alt="" width="72" height="72">

    <h1 class="h3 mb-3 font-weight-normal">Registrarse</h1>
    <div class="mt-2">
      <label for="nombre" class="sr-only">Correo</label>
      <input type="nombre" id="nombre" name="nombre" class="form-control" placeholder="Ingrese su nombre" required autofocus>
    </div>

    <div class="mt-2">
      <label for="email" class="sr-only">Correo</label>
      <input type="email" id="email" name="email" class="form-control" placeholder="Ingrese su correo" required autofocus>
    </div>

    <div class="mt-2">
      <label for="password" class="sr-only">Password</label>
      <input type="password" id="password" name="password" class="form-control" placeholder="Ingrese una contraseña" required>
    </div>

    <div class="mt-2">
      <label for="rep_password" class="sr-only">Password</label>
      <input type="password" id="rep_password" name="rep_password" class="form-control" placeholder="Repita su contraseña" required>
    </div>
    <button onclick="save();" class="btn btn-lg btn-primary btn-block" type="submit">Registrase</button>
    <p class="mt-2 mb-3 text-muted">&copy; 2021- <?= date('Y') ?></p>

    <a href="<?=base_url?>/Login">Iniciar Session</a>
  </form>

  <!-- Url para JavaScrip-->
  <script>
    const base_url = "<?php echo base_url; ?>";
  </script>
  <!-- plugins -->
  <script src="<?= PLUGINS ?>/noty/noty.min.js"></script>
  <!--cargar solo en la pagina page_functions_js personalizados desde el controlador-->
  <script src="<?= ASSETS ?>/app/js/<?= $data['function_js']; ?>"></script>
</body>

</html>