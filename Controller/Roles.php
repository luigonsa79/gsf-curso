<?php 
class Roles extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }


    public function index()
    {   
        $data['roles'] = RolesModel::listEqual('roles');
        $data['page_name'] = "Roles de usuarios";
        $this->views->getView($this,"index",$data);
    }



}