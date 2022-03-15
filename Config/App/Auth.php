<?php
class Auth
{

  public static function sessionUser(int $iduser)
  {
    $respuesta = DB::SQL("SELECT * FROM usuarios u INNER JOIN roles r ON u.id_rol = r.id WHERE u.id_usuario = {$iduser}");
    $_SESSION['userData'] = $respuesta[0];
    return $respuesta[0];
  }

  /**
   *
   * @void sessiones
   *
   */
  public static function noAuth()
  {
    if (!isset($_SESSION['login'])) {
      header('Location:' . base_url . '/login');
    }
  }

  public static function logout()
  {
    session_start();
    session_destroy();
    $_SESSION = [];
    header('Location:' . base_url . '/login');
  }
}
