<?php
  $host_name = 'db745063418.db.1and1.com';
  $database = 'db745063418';
  $user_name = 'dbo745063418';
  $password = '/Anne023';

  $dbh = null;
  try {
    $dbh = new PDO("mysql:host=$host_name; dbname=$database;", $user_name, $password);
    $dbh->exec("SET CHARACTER SET utf8");
  } catch (PDOException $e) {
    echo "Erreur!: " . $e->getMessage() . "<br/>";
    die();
  }
  ?>
