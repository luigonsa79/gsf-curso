<?php
class Dashboard extends Controller
{

    public function index()
    {
        $data['page_name'] = "Dashboard";
        $data['function_js'] = "Dashboard.js";
       $this->views->getView($this, 'index', $data);
       
    }
}
