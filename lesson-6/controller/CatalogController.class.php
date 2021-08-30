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
    $item = db::getInstance()->Select(
      'select id, title, img, desc_short from products
      join images on (products.id = images.product_id)'
    );

    return $item; 
  }
}