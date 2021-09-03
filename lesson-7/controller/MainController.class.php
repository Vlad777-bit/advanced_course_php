<?php

class MainController extends Controller
{
  public $view = 'main';
  public $title;

  function __construct()
  {
    parent::__construct();
    $this->title .= ' | Главная';
  }

  function main($data) 
  {
    return ;
  }
}