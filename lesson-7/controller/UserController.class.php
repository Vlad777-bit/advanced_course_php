<?php

class UserController extends Controller
{
  public $view = 'account';
  public $title;
  public $titlePage;

  function __construct() 
  {
    parent::__construct();
    $this->title .= ' | Личный кабинет';
  }

  function account()
  {
    $this->titlePage = 'Личный кабинет';
    return "Добро пожаловать, ";
  }

  function editUserData()
  {
    $this->titlePage = 'Редактирование данных';
    if (isset($_POST)) {
      EditUserData::checkAction();
    }
    // return implode(', ', EditUserData::$logErrors);
    print_r(EditUserData::$logErrors);
    // print_r($_SESSION);
    
  }
}
