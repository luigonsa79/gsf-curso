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
        $arrJson = [];
        $users = UsuariosModel::all();

        if (empty($users)) {
            $arrJson = ['msg' => 'No se encontraron registros'];
        } else {

            for ($i = 0; $i < count($users); $i++) {
                if ($users[$i]['is_activo'] == 1) {
                    $users[$i]['is_activo'] = '<span class="badge badge-success">Activo</span>';
                } else {
                    $users[$i]['is_activo'] = '<span class="badge badge-danger">Inactivo</span>';
                }
            }

            $arrJson = $users;
        }

        echo json_encode($arrJson, JSON_UNESCAPED_UNICODE);
    }

    public function nuevo()
    {
        $data['page_name'] = "Nuevo Usuario";
        $data['function_js'] = "Usuarios.js";
        $this->views->getView($this, 'nuevo', $data);
    }

    public function editar()
    {
        $data['page_name'] = "Editar Usuario";
        $data['function_js'] = "Usuarios.js";
        $this->views->getView($this, 'editar', $data);
    }
}
