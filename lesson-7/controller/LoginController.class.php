<?php

class LoginController extends Controller
{
  public $view = 'authorization'; 
  public $title;
  public $titlePage;

  function __construct()
  {
    parent::__construct();
    $this->title .= ' | Вход';
    $this->titlePage = 'Вход';
  }

  function login()
  {
    if (isset($_POST)) {
      Login::checkAction();
    }
    return implode(', ', Login::$logErrors);
  }
}