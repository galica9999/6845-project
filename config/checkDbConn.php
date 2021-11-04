<?php 

    require "config.php";

    try {
  $connection = new PDO("mysql:host=$host", $username, $password, $options);
  echo "Db connected";
} catch(PDOException $error) {
  echo $sql . "<br>" . $error->getMessage();
}

