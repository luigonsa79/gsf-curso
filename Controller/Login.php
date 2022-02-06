<?php
class Login extends Controller
{
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $data['title'] = 'Ingreso al sistema';
    $this->views->getView($this, 'index', $data);
  }


}
