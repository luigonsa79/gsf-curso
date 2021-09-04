<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="
<?php echo media(); ?>/img/favicon-256x256.png">
    <title><?php echo $data['page_name']; ?></title>


    <!-- Bootstrap -->
    <link href="
<?php echo media(); ?>/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="
<?php echo media(); ?>/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="
<?php echo media(); ?>/css/nprogress/nprogress.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="
<?php echo media(); ?>/css/custom.min.css" rel="stylesheet">
    <!-- Mis estilos -->
    <link href="
<?php echo media(); ?>/app/css/app.css" rel="stylesheet">

</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="index.html" class="site_title"><i class="fa fa-gear"></i> <span>GSF</span></a>
                    </div>

                    <div class="clearfix"></div>

                    <!-- menu profile quick info -->
                    <div class="profile clearfix">
                        <div class="profile_pic">
                            <img src="<?php echo base_url(); ?>/assets/img/img.jpg" alt="foto del perfil" class="img-circle profile_img">
                        </div>
                        <div class="profile_info">
                            <span>Bienvenido,</span>
                            <h2>Usuario</h2>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <!-- /menu profile quick info -->

                    <br />
                    <?php
                    include_once "nav.php";
                    ?>