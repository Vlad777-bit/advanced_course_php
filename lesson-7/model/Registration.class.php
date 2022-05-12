<?php

class Registration extends Model
{
  protected static $table = 'users';
  static $logErrors = [];

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

  private static function getValUser($col, $val)
  {
    return db::getInstance()->Select(
      "SELECT `$col` FROM " . self::$table . 
      " WHERE `$col` = :$val",

      ["$val" => $val]
    )[0]["$col"];
  }

  public static function checkFormRegistration()
  {
    try {

      if ($_POST['user_login'] === self::getValUser('login', $_POST['user_login'])) {
        throw new Exception("Такой логин занят");
      } else {
        self::setSession('login', trim(strip_tags($_POST['user_login'])));
      }

      if ($_POST['user_password'] !== $_POST['repeat_password']) {
        throw new Exception("Ваши пароли не совпадают");
      } else {
        self::setSession('password', trim(strip_tags($_POST['user_password'])));
      }

      if (!$_POST['user_name']) {
        throw new Exception("Ошибка в строке Name");
      } else {
        self::setSession('name', trim(strip_tags($_POST['user_name'])));
      }

      self::createNewUser($_POST);

    } catch (Exception $e) {
      self::$logErrors['errorForm'] = $e->getMessage();
    }

    if (count(self::$logErrors) <= 0) {
      header("Location: index.php?path=User/account");
    }
  }

  private static function createNewUser($dataUser)
  {
    return db::getInstance()->Query(
      "INSERT INTO users (name, login, password) 
      VALUES (:name, :login, :password);",

      [
        'name' => "{$dataUser['user_name']}",
        'login' => "{$dataUser['user_login']}",
        'password' => md5("{$dataUser['user_password']}")
      ]
    );
  }
}
