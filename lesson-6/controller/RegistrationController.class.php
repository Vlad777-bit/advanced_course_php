<?php

class RegistrationController extends Controller
{
  public $view = 'authorization';
  public $title;
  public $titlePage;

  function __construct() 
  {
    parent::__construct();
    $this->title .= ' | Вход';
    $this->titlePage = 'Регистрация';
  }

  function registration($data) 
  {
    Registration::checkFormRegistration();
    print_r($_SESSION);
    return implode(', ', Registration::$regErrors);
  }
}