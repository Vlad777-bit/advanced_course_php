<?php

abstract class Product
{
  const PROFIT_PERCENT = 10;
  const PRICE = 1500;

  abstract function __get($val);
  abstract function countInOne();
  abstract function totalCost();
  abstract function count();
}
