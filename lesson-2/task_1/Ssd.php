<?php

spl_autoload_register(function ($className)
{
  include_once "$className.php";
});

class Ssd extends Product
{
  private $title;
  private $price;
  private $count;

  function __construct($title, $count = 1)
  {
    $this->title = $title;
    $this->price = 3000;
    $this->count = $count;
  }

  public function __get($val) 
  {
    if (!isset($this->$val)) {
      die('<br>Такого свойства не существует!');
    }
    return $this->$val;
  }

  public function count() 
  {
    return "Вы приобрели товар {$this->title} " . "за " . $this->count * $this->price;
  }
}