<?php

/**
  * Configuration for database connection
  *
  */

$host       = "localhost";
$username   = "id17692912_admin";
$password   = "ZEZ1?JW5KB~?yB6y";
$dbname     = "id17692912_comments"; // will use later
$dsn        = "mysql:host=$host;dbname=$dbname"; // will use later
$options    = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
              );

// $host       = "localhost";
// $username   = "root";
// $password   = "Admin123";
// $dbname     = "comments"; // will use later
// $dsn        = "mysql:host=$host;dbname=$dbname"; // will use later
// $options    = array(
//                 PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
//               );
