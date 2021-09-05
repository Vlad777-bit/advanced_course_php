<?php

class Registration extends Model
{
  protected static $table = 'users';
  static $regErrors = [];

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

  private static function getLoginUser($login)
  {
    return db::getInstance()->Select(
      "SELECT `login` FROM " . self::$table . 
      " WHERE `login` = :login",

      ['login' => $login]
    )[0]['login'];
  }

  public static function checkFormRegistration()
  {
    $data = [];

    foreach ($_POST as $key => $val) {
      $data[$key] = trim(strip_tags( $val));

      if (isset($val) && !$val) {
        return self::$regErrors['empty'] = 'Поля должны быть заполнены';
      }

      if ($key === 'user_login' && $val === self::getLoginUser($val)) {
        return self::$regErrors['errLogin'] = 'Такой логин уже зарегистрирован';
      }
    }

    // Не смог занести в foreach

    if ($data['user_password'] !== $data['repeat_password']) {
      return self::$regErrors['errPassword'] = 'Ваши пароли не совпадают';
    }

    if (self::createNewUser($data)) {
      // self::setSession($data['user_name'], $data['user_login'], $data['user_password']);
      header("Location: index.php?path=Login/login/success");
    } else {
      header("Location: index.php?path=Login/login/error");
    }
  }

  // private static function setSession($name, $login, $password)
  // {
  //   $_SESSION['name'] = $name;
  //   $_SESSION['login'] = $login;
  //   $_SESSION['password'] = $password;
    
  //   // header("Location: index.php?path=User/account");
  // }

  private static function createNewUser($dataUser)
  {
    return db::getInstance()->Query(
      "INSERT INTO users (name, login, password) 
      VALUES (:name, :login, :password);",

      [
        'name' => $dataUser['user_name'],
        'login' => $dataUser['user_login'],
        'password' => $dataUser['user_password']
      ]
    );
  }
}
