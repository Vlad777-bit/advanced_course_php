<?php

class CatalogController extends Controller
{
  public $view = 'catalog';
  public $title; 

  function __construct()
  {
    parent::__construct();
    $this->title .= ' | Каталог';
    $this->titlePage = 'Каталог';
  }

  function catalog()
  {
    return Good::getCatalogGoods();
  }
}