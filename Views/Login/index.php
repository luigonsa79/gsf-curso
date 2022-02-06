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

  <link href="<?= CSS ?>/signin.css" rel="stylesheet">
</head>

<body class="text-center">

  <form class="form-signin" novalidate>
    <img class="mb-4" src="<?= get_logo() ?>" alt="" width="72" height="72">

    <h1 class="h3 mb-3 font-weight-normal">Iniciar session</h1>

    <label for="email" class="sr-only">Correo</label>
    <input type="email" id="email" name="email" class="form-control" placeholder="Ingrese su correo" required autofocus>

    <label for="password" class="sr-only">Password</label>
    <input type="password" id="password" name="password" class="form-control" placeholder="Ingrese una contraseña" required>

    <button class="btn btn-lg btn-primary btn-block" type="submit">Ingresar</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2021- <?= date('Y') ?></p>

    <a href="<?= base_url ?>/Register">Registrase</a>

  </form>
</body>

</html>