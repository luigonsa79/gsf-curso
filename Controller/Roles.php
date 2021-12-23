<?php 
class Roles extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }


    public function index()
    {   
        $data['roles'] =  $this->model->listRoles();
        $data['page_name'] = "Roles de usuarios";
        $this->views->getView($this,"index",$data);
    }



}