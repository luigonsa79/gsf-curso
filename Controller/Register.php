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
      $val = new Validations();
      $val->name('nombre')->value(limpiar($_POST['nombre']))->required();
      $val->name('email')->value(limpiar($_POST['email']))->pattern('email')->required();
      $val->name('password')->value(limpiar($_POST['password']))->min(5)->max(20)->pattern('alphanum')->equal(limpiar($_POST['rep_password']))->required();

      if($val->isSuccess()){
        $passHash = hash("sha256", limpiar($_POST['password']));
  
        $data = [
          'nombre'   => limpiar($_POST['nombre']),
          'email'    => limpiar($_POST['email']),
          'password' => $passHash,
        ];
        $idInsert = RegisterModel::insert('usuarios', $data);
        $data = ['status' => true, 'msg' => 'Registro guardado'];
      }else{
        $data = ['error' => $val->getErrors()];

      }

     
    }

    echo json_encode($data, JSON_UNESCAPED_UNICODE);
  }
}
