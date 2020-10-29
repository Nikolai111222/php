<?php
  abstract class AbstractUser {
    abstract public function connect();
    abstract public function pushUser();
    abstract public function printUsers();
    abstract public function usersByName();
  }

  class User extends AbstractUser {
    public $db_connection;

    function __construct($username, $password, $email) {
      $this->username = $username;
      $this->password = $password;
      $this->email = $email;
    }

    public function connect() {
      $this->db_connection = new PDO('mysql:host=localhost;dbname=php_db_db', 'mysql', 'mysql');
      echo 'Успешное подкючение к БД'.'<br/><br/>';
    }
    public function pushUser() {
      if (isset($this->username) && isset($this->password)) {
        $query = "INSERT INTO `users` (`username`, `password`, `email`) VALUES (:username,:password,:email)";
        $params = [
            ':username' => $this->username,
            ':password' => $this->password,
            ':email' => $this->email,
        ];
        $stmt = $this->db_connection->prepare($query);
        $stmt->execute($params);
        echo 'Пользователь <b>'. $this->username .'</b> добавлен'.'<br/><br/>';
      }
    }
    public function printUsers() {
      $stmt = $this->db_connection->query("SELECT * FROM `users`");
      echo 'Все пользователи:'.'<br />';
      while ($row = $stmt->fetch()) {
        echo '<pre>';
        print_r($row);
        echo '</pre>';
      }
    }
    public function usersByName() {
      $stmt = $this->db_connection->query("SELECT * FROM `users` WHERE username = 'Nikolai'");
      echo 'Пользователи с username Nikolai:'.'<br />';
      while ($row = $stmt->fetch()) {
        echo '<pre>';
        print_r($row);
        echo '</pre>';
      }
    }
  }

  $user = new User($_POST['username'], $_POST['password'], $_POST['email']);
  $user->connect();
  $user->pushUser();
  $user->printUsers();
  $user->usersByName();