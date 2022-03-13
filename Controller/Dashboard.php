<?php
class Dashboard extends Controller
{
    public function __construct()
    {
        Auth::noAuth();
        Permisos::get_permisos(2);
        parent::__construct();
    }

    public function index()
    {
        $data['page_name'] = "Dashboard";
        $data['function_js'] = "Dashboard.js";
        $this->views->getView($this, 'index', $data);
    }
}
