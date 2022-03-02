<?php
class Perfil extends Controller
{


    public function index()
    {
        $data['page_name'] = 'Perfil del usuario';
        $data['function_js'] = 'Perfil.js';
        $this->views->getView($this, 'index', $data);
    }
}
