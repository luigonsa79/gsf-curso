<?php
class Usuarios extends Controller
{

    public function __construct()
    {
        Auth::noAuth();
        Permisos::getPermisos(USUARIOS);
        parent::__construct();
    }

    public function index()
    {
        if (empty($_SESSION['permisosMod']['r'])) {
            header('Location:' . base_url . '/perfil');
        }

        $data['page_name'] = "Usuarios";
        $data['function_js'] = "Usuarios.js";
        $this->views->getView($this, 'index', $data);
    }
    public function all()
    {
        $arrJson = [];
        $users = UsuariosModel::all();

        if (empty($users)) {
            $arrJson = ['msg' => 'No se encontraron registros'];
        } else {

            for ($i = 0; $i < count($users); $i++) {
                if ($users[$i]['is_activo'] == 1) {
                    $users[$i]['is_activo'] = '<span class="badge badge-success">Activo</span>';
                } else {
                    $users[$i]['is_activo'] = '<span class="badge badge-danger">Inactivo</span>';
                }
            }

            $arrJson = $users;
        }

        echo json_encode($arrJson, JSON_UNESCAPED_UNICODE);
    }

    public function nuevo()
    {
        $roles = UsuariosModel::rolesAll();

        $data['roles'] = to_obj($roles);
        $data['page_name'] = "Nuevo Usuario";
        $data['function_js'] = "Usuarios.js";
        $this->views->getView($this, 'nuevo', $data);
    }

    public function store()
    {
        // debug($_POST);

        // guardar
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if (empty($_POST['id'])) {

                try {
                    //code...
                    // validar
                    $val = new Validations();
                    $val->name('nombre de usuario')->value(limpiar($_POST['nombre']))->required();
                    $val->name('correo del usuario')->value(limpiar($_POST['correo']))->pattern('email')->required();
                    $val->name('password del usuario')->value(limpiar($_POST['password']))->min(5)->max(20)->pattern('alphanum')->equal(limpiar($_POST['repit-password']))->required();

                    if ($val->isSuccess()) {
                        //guardar
                        $data = [
                            'nombre' => limpiar($_POST['nombre']),
                            'email' => limpiar($_POST['correo']),
                            'password' => hash("sha256", limpiar($_POST['password'])),
                            'id_rol' => limpiar($_POST['selRol']),
                            'is_activo' => limpiar($_POST['selStatus']),
                        ];
                        $save = UsuariosModel::save($data);
                        Alertas::new(sprintf("Se ha guardado el usuario %s", limpiar($_POST['nombre'])), "success");
                        header('Location:' . base_url . '/usuarios');
                    } else {
                        Alertas::new($val->getErrors(), 'danger');
                        header('Location:' . base_url . '/usuarios/nuevo');
                    }
                } catch (PDOException $e) {
                    Alertas::new($e->getMessage(), 'danger');
                }
            } else {
                // actualizar
                try {
                    //code...
                    // validar
                    $val = new Validations();
                    $val->name('nombre de usuario')->value(limpiar($_POST['nombre']))->required();
                    $val->name('correo del usuario')->value(limpiar($_POST['correo']))->pattern('email')->required();


                    if ($val->isSuccess()) {
                        //actualizar
                        $data = [
                            'nombre' => limpiar($_POST['nombre']),
                            'email' => limpiar($_POST['correo']),
                            'id_rol' => limpiar($_POST['selRol']),
                            'is_activo' => limpiar($_POST['selStatus']),
                        ];
                        $save = UsuariosModel::updateUser($data, $_POST['id']);
                        Alertas::new(sprintf("Se ha actualizado el usuario %s", limpiar($_POST['nombre'])), "success");
                        header('Location:' . base_url . '/usuarios');
                    } else {
                        Alertas::new($val->getErrors(), 'danger');
                        header('Location:' . base_url . '/usuarios/editar/' . $_POST['id']);
                    }
                } catch (PDOException $e) {
                    Alertas::new($e->getMessage(), 'danger');
                }
            }
        }
    }

    public function editar($id)
    {
        $idusuario = limpiar($id);
        if ($idusuario > 0) {
            $roles = UsuariosModel::rolesAll();
            $usuario = UsuariosModel::oneUser($idusuario);
        }

        $data['roles'] = to_obj($roles);
        $data['usuario'] = to_obj($usuario[0]);
        $data['page_name'] = "Editar Usuario";
        $data['function_js'] = "Usuarios.js";
        $this->views->getView($this, 'editar', $data);
    }

    public function destroy()
    {
        $id = intval($_POST['id']);

        $user = UsuariosModel::oneUser($id);

        if (empty($user)) {
            Alertas::new("No se encontró el usuario", "danger");
            header('Location:' . base_url . '/usuarios');
        }

        UsuariosModel::deleteUser($id);
        echo json_encode(['msg' => 'Se ha eliminado el usuario '], JSON_UNESCAPED_UNICODE);
    }
}
