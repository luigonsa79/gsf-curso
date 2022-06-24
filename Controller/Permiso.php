<?php
class Permiso extends Controller
{
  public function __construct()
  {
    Auth::noAuth();
    parent::__construct();
  }

  public function index($id)
  {

    $rolId = intval(limpiar($id));
    if ($rolId > 0) {
      $paginas = PermisoModel::paginas();
      $permisosByRole = PermisoModel::permisosByRole($rolId);
      $roles = PermisoModel::roles($rolId);
      $permisos = ['c' => 0, 'r' => 0, 'u' => 0, 'd' => 0,];
      $accesosByRoles = ['id_rol' => $rolId, 'rol' => $roles['nombre']];

      if (empty($permisosByRole)) {
        for ($i = 0; $i < count($paginas); $i++) {
          $paginas[$i]['accesos'] = $permisos;
        }
      } else {
        for ($i = 0; $i < count($paginas); $i++) {
          $permisos = ['c' => 0, 'r' => 0, 'u' => 0, 'd' => 0,];
          if (isset($permisosByRole[$i])) {
            $permisos = ['c' => $permisosByRole[$i]['c'], 'r' => $permisosByRole[$i]['r'], 'u' => $permisosByRole[$i]['u'], 'd' => $permisosByRole[$i]['d']];
          }
          $paginas[$i]['accesos'] = $permisos;
        }
      }

      $accesosByRoles['paginas'] = $paginas;
    }

    $this->views->getView($this, "index", [
      'page_name' => "Permiso por rol",
      'function_js' => "Permiso.js",
      'accesobyRole' => $accesosByRoles
    ]);
  }

  public function store()
  {
    if ($_SESSION['userData']['id_rol'] == 1) {
      if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $idRol = intval($_POST['idRol']);
        $paginas = $_POST['paginas'];

        PermisoModel::deletePermisos($idRol);
        foreach ($paginas as $page) {
          $idpage = $page['id'];
          $c = empty($page['c']) ? 0 : 1;
          $r = empty($page['r']) ? 0 : 1;
          $u = empty($page['u']) ? 0 : 1;
          $d = empty($page['d']) ? 0 : 1;
          $nuevoCambio = PermisoModel::insertPermisos([
            'id_rol' => $idRol,
            'id_pagina' => $idpage,
            'c' => $c, 
            'r' => $r,
            'u' => $u,
            'd' => $d,
            'creado' => now(),
          ]);
        }

        if ($nuevoCambio > 0) {
          Alertas::new('Los permisos se guardaron correctamente', 'success');
          header('Location:' . base_url . '/permiso/index/' . $idRol);
          // permiso/index/2
        }else{
          Alertas::new('Error al guardar los permisos', 'danger');
          header('Location:' . base_url . '/permiso/index/' . $idRol);
        }
      }
    } else {

      Alertas::new('No tiene permiso para realizar esta accion', 'warning');
      header('Location:' . base_url . '/roles');
    }
  }
}
