<?php
class Register extends Controller
{
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $data['title'] = 'Registrarse al sistema';
    $data['function_js'] = 'Register.js';
    $this->views->getView($this, 'register', $data);
  }

  public function save()
  {
    $data = [];
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $rep_password = $_POST['rep_password'];


    if ($_SERVER['REQUEST_METHOD'] == "POST") {
      $data = ['status' => true, 'msg' => 'Registro guardado'];
    }

    


    echo json_encode($data, JSON_UNESCAPED_UNICODE);
  }
}
