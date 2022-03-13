<?php
class Usuarios extends Controller
{

    public function __construct()
    {
        Auth::noAuth();
        Permisos::get_permisos(3);
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
}
