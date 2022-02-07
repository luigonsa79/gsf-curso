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

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
      // validar
      $errores = RegisterModel::validar();
      $data = $errores;

      if (empty($errores)) {
        $passHash = hash("sha256", esc($_POST['password']));

        $data = [
          'id_rol'   => 3,
          'nombre'   => esc($_POST['nombre']),
          'email'    => esc($_POST['email']),
          'password' => $passHash,
        ];

        $idInsert = RegisterModel::insert('usuarios', $data);
        $data = ['status' => true, 'msg' => 'Registro guardado'];
      }
    }

    echo json_encode($data, JSON_UNESCAPED_UNICODE);
  }
}
