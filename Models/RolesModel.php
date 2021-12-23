<?php
class RolesModel
{

    public $id_rol;
    public $nombre_rol;
    public $estado_rol;

    private $conexion;

    public function __construct()
    {
        $this->conexion = new Conexion();
        $this->conexion =   $this->conexion->conect();
    }


    public function listRoles()
    {
        $sql = $this->conexion->prepare("SELECT * FROM roles");
        $sql->execute();
        $data = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }





}
