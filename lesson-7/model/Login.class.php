<?php

class Login extends Model
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

  private static function getUser($login, $password)
  {
    return db::getInstance()->Select(
      "SELECT * FROM " . self::$table . 
      " WHERE `login` = :login AND `password` = :password",

      ['login' => $login, 'password' => $password]
    );
  }

  public static function checkAction()
  {
    if (isset($_POST['sign-out'])) {
      return self::logout();
    }

    if (isset($_POST['sign-in'])) {
      return self::checkFormUser();
    } 

    if (isset($_POST['registration'])) {
      return header("Location: index.php?path=Registration/registration");
    } 
  }

  private static function checkFormUser()
  {
    try {

      $login = trim(strip_tags( $_POST['login'] ));
      $password = trim(strip_tags( $_POST['password'] ));

      if (!($login && $password)) {
        throw new Exception("Неверный логин/пароль");
      } else {
        $data = self::getUser($login, md5($password));
      }

      if (!$data) {
        throw new Exception("Пользователь не найден");
      } else {
        foreach ($data[0] as $key => $val) {
          self::setSession($key, $val);
        }
      }

    } catch (Exception $e) {
      self::$logErrors['errorForm'] = $e->getMessage();
    }

    if (count(self::$logErrors) <= 0) {
      header("Location: index.php?path=User/account");
    } else {
      return self::$logErrors;
    }
  }
  public static function logout()
  {
    $_SESSION = [];
    session_destroy();
    header('Location: index.php?path=Login/login');
  } 
}