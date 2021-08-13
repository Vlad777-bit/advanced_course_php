<?php
include_once ('./Product.php');
 
class Processor extends Product
{
  private $frequency;
  private $countKernel;

  public function __construct($title, $price, $count, $frequency, $countKernel)
  {
    parent::__construct($title, $price, $count);
    $this->frequency = $frequency;
    $this->countKernel = $countKernel;
  }

  public function getSpecific() 
  {
    parent::getSpecific();

    echo 
    "
      Кол-во ядер: $this->countKernel <br>
      Частота: $this->frequency <br>
    ";
  }
}

$ryzen = new Processor('AMD Ryzen™ 5000', 25190, 4, '4.3', 8);

$ryzen->getSpecific();