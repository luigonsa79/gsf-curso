<?php
class PermisoModel extends DB
{
    public function __construct()
    {
        parent::__construct();
    }

    static function paginas()
    {
        return $paginas = DB::query("SELECT * FROM paginas WHERE activo !=0");
    }
    static function permisosByRole($idRol)
    {
        return $permisoByRole = DB::query("SELECT * FROM permisos WHERE id_rol = {$idRol}");
    }
    static function roles($idRol)
    {
        $roles = DB::query("SELECT * FROM roles WHERE id = {$idRol}");
        return $roles[0];
    }
    static function deletePermisos($idRol)
    {
        return DB::query("DELETE FROM permisos WHERE id_rol = {$idRol}");
       
    }
    static function insertPermisos($data)
    {
        return DB::insert('permisos',$data);
       
    }
   
}
