<?php

const base_url = 'http://localhost/gsf-curso';


/* ----------------------------------------------------- */
/*             CONSTANTES PARA CONEXION DB                  */
/* ----------------------------------------------------- */

const DB_HOST = "localhost";
const DB_NAME = "gsfdb";
const DB_USER = "root";
const DB_PASSWORD = "";
const DB_CHARSET = "utf8";

/* ----------------------------------------------------- */
/*             DIRECTORIOS DE LA APP                    */
/* ----------------------------------------------------- */
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(__DIR__));
define('CONTROLLER', ROOT . DS . 'Controller');


/* ----------------------------------------------------- */
/*              CONTROLLER Y METHOD DEFAULT              */
/* ----------------------------------------------------- */

define('CONTROLLER_DEFAULT', 'Login');
define('METHOD_DEFAULT', 'index');
