<?php
class UsuariosModel extends DB
{
  public function __construct()
  {
    parent::__construct();
  }


  public static function all()
  {
    $respuesta = DB::SQL("SELECT u.id_usuario, r.id, r.nombre as rol, u.nombre as nombre_usuario, u.email, u.is_activo FROM usuarios u INNER JOIN roles r ON u.id_rol = r.id");
    return $respuesta;
  }
}
