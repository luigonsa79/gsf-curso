<?php 
class Error404 extends Controller 
{


  public function index()
  {

    $this->views->getView($this,'index');
  }

}