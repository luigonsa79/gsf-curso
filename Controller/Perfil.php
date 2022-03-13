<?php
class Perfil extends Controller
{
    public function __construct()
    {
        Auth::noAuth();
        Permisos::get_permisos(1);
        parent::__construct();
    }


    public function index()
    {

        

        $data['page_name'] = 'Perfil del usuario';
        $data['function_js'] = 'Perfil.js';
        $this->views->getView($this, 'index', $data);
    }
}
