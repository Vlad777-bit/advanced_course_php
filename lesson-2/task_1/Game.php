<?php

spl_autoload_register(function ($className)
{
  include_once "$className.php";
});

class Game extends Product
{
  private $title;
  private $price; 
  private $count;

  public function __construct($title, $count = 1)
  {
    $this->title = $title;
    $this->count = $count;
    $this->price = parent::PRICE;
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
    return "Стоимость за один товар составляет " . $this->price;
  }

  public function totalCost()
  {
    return $this->price * $this->count;
  }

  public function count() 
  {
    return "Вы приобрели товар $this->title, в кол-ве $this->count шт. за "  . $this->totalCost() . " руб. <br> Прибыль с продажи составляет " . $this->totalCost() / 100 * parent::PROFIT_PERCENT . " руб.";
  }
}