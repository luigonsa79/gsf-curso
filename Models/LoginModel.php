<?php
class LoginModel extends DB
{
  public function __construct()
  {
    parent::__construct();
  }

  public static function login(string $email, string $pass)
  {
    $sql = "SELECT * FROM usuarios WHERE email= :email AND password =:pass LIMIT 1";
    return ($rows = parent::query($sql, ['email' => $email, 'pass' => $pass])) ? $rows[0] : [];
  }
}
