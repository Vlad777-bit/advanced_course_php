<?php

class Login extends Model
{
  protected static $table = 'users';
  static $loginErrors = [];

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

  private static function getUsers()
  {
    return db::getInstance()->Select(
      "SELECT * FROM " . self::$table
    );
  }

  public static function getUser($login, $password)
  {
    return db::getInstance()->Select(
      "SELECT * FROM " . self::$table . 
      " WHERE `login` = '$login' AND `password` = '$password'"
    );
  }

  public static function checkAction()
  {
    if (isset($_POST['sign-out'])) {
      return self::logout();
    }

    if (isset($_POST['sign-in'])) {
      return self::checkUser();
    } 

    if (isset($_POST['registration'])) {
      return header("Location: index.php?path=Registration/registration");
    } 
  }

  public static function checkUser()
  {
    $login = trim(strip_tags( $_POST['login'] ));
    $password = trim(strip_tags( $_POST['password'] ));

    if (!($login && $password)) {
      return self::$loginErrors[0] = 'Поля не могут быть пустыми';
    }
   
    $data = self::getUser($login, md5($password));

    if (!$data) {
      return self::$loginErrors[1] = 'Не верный логин/пароль';
    } else {
      return self::setSession(
        $data[0]['name'],
        $data[0]['email'],
        $data[0]['phone'],
        $data[0]['login'],
        $data[0]['password'],
        $data[0]['is_admin']
      );
    }
  }

  private static function setSession($name, $email, $phone = null, $login, $password, $isAdmin)
  {
    $_SESSION['name'] = $name;
    $_SESSION['email'] = $email;
    $_SESSION['phone'] = $phone;
    $_SESSION['login'] = $login;
    $_SESSION['password'] = $password;
    $_SESSION['isAdmin'] = $isAdmin;   
    
    header("Location: index.php?path=User/account");
  }

  public static function logout()
  {
    // $_SESSION['name'] = '';
    // $_SESSION['login'] = '';
    // $_SESSION['password'] = '';
    // $_SESSION['isAdmin'] = '';
    $_SESSION = [];
    session_destroy();
    header('Location: index.php?path=Login/login');
  } 
}
