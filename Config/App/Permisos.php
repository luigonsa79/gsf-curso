<?php
class Permisos
{


  public static function getPermisos($idPagina)
  {

    if (!empty($_SESSION['userData'])) {
      $intRol = $_SESSION['userData']['id_rol'];
      $arrPermisos =  self::permisoPagina($intRol);
      $permisos = '';
      $permisosMod = '';
      if (count($arrPermisos) > 0) {
        $permisos = $arrPermisos;
        $permisosMod = isset($arrPermisos[$idPagina]) ? $arrPermisos[$idPagina] : "";
      }

      $_SESSION['permisos'] = $permisos;
      $_SESSION['permisosMod'] = $permisosMod;
    }
  }


  private static function permisoPagina(int $idRol)
  {

    $sql = DB::SQL("SELECT * FROM permisos p INNER JOIN paginas pg ON p.id_pagina = pg.id WHERE p.id_rol = {$idRol}");
    $arrPermisos = [];

    for ($i = 0; $i < count($sql); $i++) {
      $arrPermisos[$sql[$i]['id']] = $sql[$i];
    }


    return $arrPermisos;
  }

  public static function nav()
  {
    $sql = DB::SQL("SELECT id as idpagina, titulo, icono FROM paginas");

    foreach ($sql as $item) {
      if (!empty($_SESSION['permisos'][$item['idpagina']]['r'])) {
        echo "<li>
        <a href='" . base_url . "/" . $item['titulo'] . " '>
          <i class='" . $item['icono'] . "'></i>
          " . $item['titulo'] . "
        </a>
      </li>";
      }
    }
  }

  public static function read()
  {
    if (!empty($_SESSION['permisosMod']['r'])) {
      return true;
    }
  }
  public static function create()
  {
    if (!empty($_SESSION['permisosMod']['c'])) {
      return true;
    }
    
  }
  public static function updater()
  {
    if (!empty($_SESSION['permisosMod']['u'])) {
      return true;
    }
  }
  public static function deleter()
  {
    if (!empty($_SESSION['permisosMod']['d'])) {
      return true;
    }
  }
}
