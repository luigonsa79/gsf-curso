<?php
class Auth
{
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
