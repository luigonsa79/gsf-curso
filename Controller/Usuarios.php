<?php
class Usuarios extends Controller
{

    public function __construct()
    {
        Auth::noAuth();
        Permisos::getPermisos(USUARIOS);
        parent::__construct();
    }

    public function index()
    {
        if (empty($_SESSION['permisosMod']['r'])) {
            header('Location:' . base_url . '/perfil');
        }

        $data['page_name'] = "Usuarios";
        $data['function_js'] = "Usuarios.js";
        $this->views->getView($this, 'index', $data);
    }
    public function all()
    {
        $arrJson = [['id' => 1, 'nombre' => 'Luis Gonzalez', 'correo' => 'admin@admin.com', 'rol' => 'root', 'estado' => 'Activo']];

        echo json_encode($arrJson, JSON_UNESCAPED_UNICODE);
    }
}
