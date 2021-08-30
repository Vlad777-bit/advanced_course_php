<?php

class LoginController extends Controller
{
  public $view = 'login';
  public $title;
  public $titlePage;

  function __construct()
  {
    parent::__construct();
    $this->title .= ' | Вход';
    $this->titlePage = 'Вход/Регистрация';
  }

  
  function login($data)
  {
    return 'hello login';
  }

  function registration($data)
  {
    return 'hello registartion';
  }
}