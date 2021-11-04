<?php

/**
  * Configuration for database connection
  *
  */

$host       = "localhost";
$username   = "admin";
$password   = "password";
$dbname     = "database"; // will use later
$dsn        = "mysql:host=$host;dbname=$dbname"; // will use later
$options    = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
              );

