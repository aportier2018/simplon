<?php
  $host_name = 'localhost';
  $database = 'test';
  $user_name = 'localhost/root';
  $password = '';

  $dbh = null;
  try {
    $dbh = new PDO("mysql:host=$host_name; dbname=$database;", $user_name, $password);
    $dbh->exec("SET CHARACTER SET utf8");
  } catch (PDOException $e) {
    echo "Erreur!: " . $e->getMessage() . "<br/>";
    die();
  }
  ?>
