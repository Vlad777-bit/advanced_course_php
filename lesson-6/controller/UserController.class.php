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
    $this->titlePage = 'Личный кабинет';
  }

  function account()
  {
    return "Добро пожаловать, ";
  }
}
