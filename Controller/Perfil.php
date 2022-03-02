<?php
class Perfil extends Controller
{
    public function __construct()
    {
        if (!isset($_SESSION['login'])) {
            header('Location:' . base_url . '/login');
        }
        parent::__construct();
    }


    public function index()
    {
        $data['page_name'] = 'Perfil del usuario';
        $data['function_js'] = 'Perfil.js';
        $this->views->getView($this, 'index', $data);
    }
}
