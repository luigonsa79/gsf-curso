<?php
class Permisos
{


  public static function get_permisos($idmodulo)
  {
    $iduser = $_SESSION['iduser'];

    $permisoByUser = DB::SQL("SELECT p.*, m.id, m.nombre FROM Permisos as p INNER JOIN modulos as m ON p.idmodulo = m.id WHERE iduser = $iduser");

    $arrPermisos = [];

    for ($i = 0; $i < count($permisoByUser); $i++) {
      $arrPermisos[$permisoByUser[$i]['idmodulo']] = $permisoByUser[$i];
    }
    $permisos = '';
    $permisosMod = '';

    if (count($arrPermisos) > 0) {
      $permisos = $arrPermisos;
      $permisosMod = isset($arrPermisos[$idmodulo]) ? $arrPermisos[$idmodulo] : "";
    }

    $_SESSION['permisos'] = $permisos;
    $_SESSION['permisosMod'] = $permisosMod;
  }
}
