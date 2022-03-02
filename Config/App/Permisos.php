<?php
class Permisos
{

  public static function getPermiso($idModulo)
  {
    $iduser = $_SESSION['iduser'];

    $sql = "SELECT p.*, m.id, m.nombre FROM permisos as p INNER JOIN modulos as m ON p.idmodulo = m.id WHERE p.iduser = :iduser";

    $permisoByUser = Conexion::query($sql, ['iduser' => $iduser]);
    debug($permisoByUser);
  }
}
