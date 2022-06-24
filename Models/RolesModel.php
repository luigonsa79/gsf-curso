<?php
class RolesModel extends DB
{
    public function __construct()
    {
        parent::__construct();
    }

    static function allRoles()
    {
        return $roles = DB::query("SELECT * FROM roles");
    }
    static function deleteRol($id)
    {
        return $id = DB::delete('roles', ['id' => $id], 1);
    }

    static function guardarRol($data)
    {
        return $id = DB::insert('roles', $data);
    }

    static function editRol($id)
    {
        $rol = DB::query("SELECT * FROM roles WHERE id = {$id}");
        return $rol[0];
    }
    static function actualizarRol($id, $data)
    {
        return $res = DB::update('roles', $data, ['id' => $id]);
    }
}
