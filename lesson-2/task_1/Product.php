<?php

abstract class Product
{
  abstract function __get($val);
  abstract function countInOne();
  abstract protected function count();
}
