<?php

spl_autoload_register(function ($className)
{
  include_once "$className.php";
});


class Sweetness extends Product 
{
  private $title;
  private $price;
  private $count;

  function __construct($title, $price, $count = 1)
  {
    $this->title = $title;
    $this->price = $price;
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
    return "Стоимость за один товар составляет $this->price";
  }

  public function totalCost()
  {
    return $this->price * $this->count;
  }

  public function count() 
  {
    return "Вы приобрели товар $this->title, в кол-ве $this->count кг. за "  . $this->totalCost() . " руб. <br> Прибыль с продажи составляет " . $this->totalCost() / 100 * parent::PROFIT_PERCENT . " руб.";
  }
}