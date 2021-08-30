<?php

class ProductController extends Controller
{
  public $view = 'catalog';
  public $title;

  function __construct()
  {
    parent::__construct();
    $this->title .= ' | Каталог';
    $this->titlePage = 'Каталог';
  }

  function product()
  {
    return db::getInstance()->Select(
      "SELECT 
      id, title, img, price, quantity, desc_short, desc_long, type_bike, age, max_weight, type_drive, bike_weight, max_speed, mileage_at_time, charging_time, frames_material
      FROM products
      INNER JOIN images ON (products.id = images.product_id)
      INNER JOIN specifications ON (products.id = specifications.product_id)
      WHERE id = $_GET[id];"
    );

  }
}

// SELECT 
// id, title, img, type_bike, age, max_weight, type_drive, bike_weight, max_speed, mileage_at_time, charging_time, frames_material
// FROM products
// INNER JOIN images ON (products.id = images.product_id)
// INNER JOIN specifications ON (products.id = specifications.product_id);