<?php

spl_autoload_register(function ($className)
{
  include_once "$className.php";
});

class Game extends Product
{
  private $title;
  private const PRICE = 1500;
  private $count;

  public function __construct($title, $count = 1)
  {
    $this->title = $title;
    $this->count = $count;
  }

  public function __get($val)
  {
    if (!isset($this->$val)) {
      die('<br>Такого свойства не существует!');
    }

    return $this->$val;
  }

  public function countInOne() 
  {
    return "Стоимость за один товар составляет " . self::PRICE;
  }

  public function count() 
  {
    return "Вы приобрели товар $this->title, в кол-ве $this->count шт. за "  . $this->count * self::PRICE . " руб.";
  }
}