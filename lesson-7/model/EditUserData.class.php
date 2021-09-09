<?php

class EditUserData extends Model
{
  protected static $table = 'users';
  public static $logErrors = [];

  protected static function setProperties()
  {
    self::$properties['id'] = [
      'type' => 'int'
    ];

    self::$properties['name'] = [
      'type' => 'varchar',
      'size' => 100
    ];

    self::$properties['email'] = [
      'type' => 'varchar',
      'size' => 100
    ];

    self::$properties['phone'] = [
      'type' => 'varchar',
      'size' => 20
    ];

    self::$properties['login'] = [
      'type' => 'varchar',
      'size' => 100
    ];

    self::$properties['password'] = [
      'type' => 'varchar',
      'size' => 50
    ];
  }

  public static function checkAction()
  {
    if (isset($_POST['save'])) {
      return self::setNewData();
    }

    if (isset($_POST['come_back'])) {
      header("Location: index.php?path=User/account");
    }
  }

  private static function setNewData()
  {
    try {
      print_r(self::getFormData($_POST));
    } catch(Exception $e) {
      self::$logErrors['ERROR'] = $e->getMessage();
    }
  }

  // private static function setSession()
}
