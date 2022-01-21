<?php
class Productos extends Controller
{
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    // $productos = ProductosModel::listEqual('productos');
    $productos = ProductosModel::join('productos', 'categorias', 'id_categoria_pro', 'id_cat', ['id_categoria_pro' => 1],1);

    $data['page_name'] = "Productos";
    $data['productos'] = $productos;
    $this->views->getView($this, "index", $data);
  }
}
