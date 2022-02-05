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

        // UPDATE
        // $Datosupdate = [
        //     'nombre_rol' => 'Website UPDATE',
        // ];
        // RolesModel::update('roles',$Datosupdate,['id_rol' => 3]);

        // DELETE
        // $id_roles = 6;
        // RolesModel::delete('roles', ['id_rol' => $id_roles]);

        $data['page_name'] = "Roles de usuarios";
        $data['function_js'] = "Roles.js";
        $this->views->getView($this, "index", $data);
    }
}
