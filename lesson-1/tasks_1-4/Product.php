<?php 
 
class Product 
{
  protected $title;
  protected $price;
  protected $count;

  protected function __construct($title, $price, $count) 
  {
    $this->title = $title;
    $this->price = $price;
    $this->count = $count;
  }

  protected function getSpecific() 
  {
    echo
    "
      Имя товара: $this->title <br>
      Цена: $this->price р. <br>
    ";
  }
}