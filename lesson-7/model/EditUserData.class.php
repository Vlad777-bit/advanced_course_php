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
      $data = self::getFormData($_POST);

      foreach ($data as $key => $val) {
        if (!$val) {
          throw new Exception("Все поля должны быть заполнены");
        }

        if (md5($data['user_password']) !== self::getColumnTable('password', self::$table, (int)$_SESSION['id'])[0]['password']) {
          throw new Exception("Вы ввели неверный пароль");
        }

        self::setSession($key, $val);
      }

      return db::getInstance()->Query(
        "UPDATE " . self::$table . " SET 
          name = :name,
          email = :email,
          phone = :phone,
          login = :login,
          password = :password

          WHERE id = :id",

        [
          'name' => $data['user_name'],
          'email' => $data['user_email'],
          'phone' => $data['user_phone'],
          'login' => $data['user_login'],
          'password' => md5($data['new_password']),
          'id' => (int)"{$_SESSION['id']}"
        ]
      );
    } catch (Exception $e) {
      self::$logErrors['ERROR'] = $e->getMessage();
    }
  }
}