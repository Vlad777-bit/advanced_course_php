<?php

class ProductController extends Controller
{
  public $view = 'catalog';
  public $title;

  function __construct()
  {
    parent::__construct();
    $this->title .= ' | Каталог';
  }

  function product() 
  {
    return Good::getGoodInfo($_GET['id']);
  }
}