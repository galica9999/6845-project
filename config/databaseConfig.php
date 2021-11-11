<?php

/**
  * Configuration for database connection
  *
  */

$host       = "localhost";
$username   = "mgs_user";
$password   = "pa55word";
$dbname     = "CVSC"; // Community Volunteer Service Center database
$dsn        = "mysql:host=$host;dbname=$dbname"; // will use later
$options    = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
              );
			  

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        exit();
    }

			  
?>