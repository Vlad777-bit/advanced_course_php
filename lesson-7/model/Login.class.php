<?php

class Login extends Model
{
  protected static $table = 'users';

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
    if ($_POST['sign-out']) {
      self::logout();
      return;
    }

    if ($_POST['sign-in']) {
      self::setSession();
      return;
    } 

    if ($_POST['registration']) {
      header("Location: index.php?path=Registration/registration");
      return;
    } 
  }

  private static function setSession()
  {
    $login = trim(strip_tags( $_POST['login'] ));
    $password = trim(strip_tags( $_POST['password'] ));

    if ($login && $password) {
      $_SESSION['login'] = $login;
      $_SESSION['password'] = $password;

      self::checkUser();
      return;
    } else {
      echo 'error';
      header("Location: index.php?path=Login/login");
    }
  }

  public static function checkUser()
  {
    $login = $_SESSION['login'];
    $password = md5($_SESSION['password']);

    $data = self::getUser($login, $password);

    if ($data) {
      $_SESSION['email'] = $data[0]['email'];
      $_SESSION['name'] = $data[0]['name'];
      $_SESSION['phone'] = $data[0]['phone'];
      $_SESSION['isAdmin'] = $data[0]['is_admin'];
      header("Location: index.php?path=User/account");
      // return;
    } else {
      echo 'err';
    }
  }

  public static function logout()
  {
    $_SESSION['name'] = '';
    $_SESSION['login'] = '';
    $_SESSION['password'] = '';
    $_SESSION['isAdmin'] = '';
    // $_SESSION = [];
    // session_destroy();
    header('Location: index.php?path=Login/login');
  } 
}
