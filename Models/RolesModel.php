<?php
class RolesModel extends DB
{

    public $id_rol;
    public $nombre_rol;
    public $estado_rol;

    

    public function __construct()
    {
       parent::__construct();
    }


    public function listRoles()
    {

        $sql = "SELECT * FROM roles WHERE estado_rol != 0";
        $resp = $this->selectAll($sql);
        return $resp;
        
    }





}
