<?php
class Roles extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }


    public function index()
    {
        // SELECT
        // $data['roles'] = RolesModel::listEqual('roles');
		
        // INSERT
        // $datos = [
        //     'nombre_rol' => 'Website',
        //     'estado_rol' => 1
        // ];

        // RolesModel::insert('roles',$datos);
        
        $data['page_name'] = "Roles de usuarios";
        $this->views->getView($this, "index", $data);
    }
}
