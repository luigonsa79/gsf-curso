<?php
class Roles extends Controller
{

    public function __construct()
    {
        parent::__construct();
        Permisos::getPermisos(ROLES);
    }


    public function index()
    {
        if (empty($_SESSION['permisosMod']['r'])) {
            header("Location:" . base_url . " /login");
        }

        $roles = RolesModel::allRoles();

        $this->views->getView($this, "index", [
            'page_name' => "Roles de usuarios",
            'function_js' => "Roles.js",
            'roles' => to_obj($roles)
        ]);
    }

    public function nuevo()
    {
        $this->views->getView($this, "nuevo", [
            'page_name' => "Nuevo rol",
            'function_js' => "Roles.js",

        ]);
    }

    public function edit($id)
    {
        if (Permisos::read()) {

            $idRol = intval(limpiar($id));

            if ($idRol > 0) {
                $rol = RolesModel::editRol($idRol);
                if (empty($rol)) {
                    Alertas::new('El registro no existe', 'warning');
                    header('Location:' . base_url . '/roles');
                }

                //    mostrar el registo en la vista
                $this->views->getView($this, "edit", [
                    'page_name' => "Editando el registro " . $rol['nombre'],
                    'function_js' => "Roles.js",
                    'rol' => to_obj($rol)
                ]);
            } else {

                header('Location:' . base_url . '/roles');
            }


            return;
        }
        Alertas::new('No tiene permiso para realizar esta accion', 'warning');
        header('Location:' . base_url . '/roles');
    }

    public function store()
    {
        if (empty($_POST['id'])) {
            // crear nuevo rol

            if (Permisos::create()) {

                if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                    try {
                        // validar
                        $val = new Validations();
                        $val->name('Nombre del rol')->value(limpiar($_POST['nombre']))->pattern('words')->min(3)->required();
                        $val->name('Estado del rol')->value(limpiar($_POST['activoRol']))->required();
                        if ($val->isSuccess()) {
                            // guardar
                            $data = [
                                'nombre' => limpiar($_POST['nombre']),
                                'activo' => limpiar($_POST['activoRol']),
                            ];

                            $id = RolesModel::guardarRol($data);
                            Alertas::new(sprintf('El rol %s se ha creado con exito con el id %s', $data['nombre'], $id));
                            header('Location:' . base_url . '/roles');
                        } else {
                            Alertas::new($val->getErrors(), 'danger');
                            header('Location:' . base_url . '/roles/nuevo');
                        }
                    } catch (PDOException $e) {
                        Alertas::new($e->getMessage(), 'danger');
                        header('Location:' . base_url . '/roles/nuevo');
                    }
                }
            } else {
                Alertas::new("No tiene permiso para realizar esta accion", 'danger');
                header('Location:' . base_url . '/roles/nuevo');
            }
        } else {
            // editar/actualizar el rol
            if (Permisos::updater()) {
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    try {
                        // validar
                        $val = new Validations();
                        $val->name('Nombre del rol')->value(limpiar($_POST['nombre']))->pattern('words')->min(3)->required();
                        $val->name('Estado del rol')->value(limpiar($_POST['activoRol']))->required();
                        if ($val->isSuccess()) {
                            // actualizar
                            $data = [
                                'nombre' => limpiar($_POST['nombre']),
                                'activo' => limpiar($_POST['activoRol']),
                            ];

                            $id = RolesModel::actualizarRol($_POST['id'], $data);
                            Alertas::new(sprintf('El rol %s se ha actualizado con exito con el id %s', $data['nombre'], $_POST['id']));
                            header('Location:' . base_url . '/roles');
                        } else {
                            Alertas::new($val->getErrors(), 'danger');
                            header('Location:' . base_url . '/roles/edit');
                        }
                    } catch (PDOException $e) {
                        Alertas::new($e->getMessage(), 'danger');
                        header('Location:' . base_url . '/roles/edit');
                    }
                }
            } else {

                Alertas::new("No tiene permiso para realizar esta accion", 'danger');
                header('Location:' . base_url . '/roles/nuevo');
            }
        }

        return;
    }

    public function destroy()
    {
        if (Permisos::deleter()) {
            $dataJson = [];
            if (empty($_POST['id'])) {
                $dataJson = ['status' => false, 'msg' => 'No se recibieron los datos'];
            } else {
                $id = intval(limpiar($_POST['id']));
                $ide = RolesModel::deleteRol($id);
                $dataJson = ['status' => true, 'msg' => Alertas::new(sprintf('El rol %s se ha eliminado correctamente', $_POST['nombre']), 'success')];
            }
        } else {
            $dataJson = ['status' => false, 'msg' => Alertas::new('No tiene permisos para realizar esta accion', 'danger')];
        }
        echo json_encode($dataJson, JSON_UNESCAPED_UNICODE);
    }
}
