<?php
class Register extends Controller
{
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $data['title'] = 'Registrarse al sistema';
    $this->views->getView($this, 'register', $data);
  }


}