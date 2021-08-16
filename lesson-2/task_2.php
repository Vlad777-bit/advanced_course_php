<?php

trait getBasicOperations {
  function select() {}

  function update() {}

  function delete($table,$where) {}

  function insert() {}
}


class DB
{
  static $object;
  static $connect;

  private function __construct()
  {
    // self::$connect = ...
  }

  public static function getObject()
  {
    if(self::$object == null){
      self::$object = new DB();
    }
    return self::$object;

  }

  use getBasicOperations;

}