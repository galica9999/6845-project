<?php 

require "./config/databaseConfig.php";

try {
  $connection = new PDO("mysql:host=$host", $username, $password, $options);
  echo "Db connected";
} catch(PDOException $error) {
  echo $sql . "<br>" . $error->getMessage();
}

?>


