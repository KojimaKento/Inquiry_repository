<?php
  class Db {
    public function PDO () {
      $dsn = 'mysql:charset=UTF8;dbname=casteria;host=localhost';
      $user = 'root';
      $password = 'root';
      $pdo = new PDO($dsn, $user, $password);
      return $pdo;
    }
  }
?>