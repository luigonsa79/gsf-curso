<?php

const base_url = 'http://localhost/gsf-curso-yt';

define('SITE_LANG', 'es');

/* ----------------------------------------------------- */
/*             CONSTANTES PAGINAS DE NAVEGACION                  */
/* ----------------------------------------------------- */

const PERFIL = 1;
const DASHBOARD = 2;
const USUARIOS = 3;
const ROLES = 4;
const PRODUCTOS = 5;
const CATEGORIAS = 6;
/* ----------------------------------------------------- */
/*             CONSTANTES PARA CONEXION DB                  */
/* ----------------------------------------------------- */

const DB_HOST = "localhost";
const DB_NAME = "gsf-curso-yt";
const DB_USER = "root";
const DB_PASSWORD = "";
const DB_CHARSET = "utf8";

/* ----------------------------------------------------- */
/*             INFORMACION DEL SITIO                  */
/* ----------------------------------------------------- */
define('SITE_CHARSET', 'UTF-8');
define('SITE_NAME', 'GSF-CURSO');
define('SITE_VERSION', '1.0.0');
define('SITE_LOGO', 'gsflogo.svg');
define('SITE_FAVICON', 'android-icon-48x48.png');
define('SITE_DESC', 'GSF FRAMEWORK');
define('SITE_LOGO_MAIN', 'main.logo.png');

/* ----------------------------------------------------- */
/*             DIRECTORIOS DE LA APP                    */
/* ----------------------------------------------------- */
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(__DIR__));
define('CONTROLLER', ROOT . DS . 'Controller');
define('VIEW', ROOT . DS . "Views");
define('TEMPLATE', VIEW . DS . "Templates");
define('IMAGE_PATH', ROOT . DS . "Assets" . DS . "img" . DS);

/* ----------------------------------------------------- */
/*             ARCHIVOS PUBLICOS                         */
/* ----------------------------------------------------- */
define('ASSETS', base_url . '/Assets');
define('CSS', ASSETS . "/css");
define('JS', ASSETS . "/js");
define('PLUGINS', ASSETS . "/plugins");
define('FAVICON', ASSETS . "/favicon/");
define('FONTS', ASSETS . "/font-awesome");
define('IMG', ASSETS . "/img/");
define('UPLOADS', ASSETS . "/uploads");


/* ----------------------------------------------------- */
/*              CONTROLLER - METHOD - ERORR DEFAULT              */
/* ----------------------------------------------------- */

define('CONTROLLER_DEFAULT', 'Login');
define('METHOD_DEFAULT', 'index');
define('CONTROLLER_ERROR', 'Error404');
