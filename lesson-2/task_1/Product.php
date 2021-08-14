<?php

abstract class Product
{
  abstract protected function count();

  abstract function __get($val);
}
