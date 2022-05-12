<?php
include_once ('./Product.php');
 
class VideoCard extends Product
{
  private $memory;
  private $typeMemory;

  public function __construct($title, $price, $count, $memory, $typeMemory)
  {
    parent::__construct($title, $price, $count);
    $this->memory = $memory;
    $this->typeMemory = $typeMemory;
  }

  public function getSpecific() 
  {
    parent::getSpecific();

    echo 
    "
      Объём памяти: $this->memory G <br>
      Тип памяти: $this->typeMemory <br>
    ";
  }
}

$radeon = new VideoCard('Gigabyte Radeon RX', 119990, 5, 8, 'GDDR6');

$radeon->getSpecific();