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
    return 'hello registartion';
  }
}