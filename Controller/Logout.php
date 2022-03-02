<?php
class Logout extends Controller
{
  public function index()
  {
    session_start();
    session_destroy();
    $_SESSION = [];
    header('Location:' . base_url . '/login');
  }
}
