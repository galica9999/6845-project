<?php ob_start(); ?>
<?php 
require "./commentConfig.php";
$lifetime = 60 * 60 * 24 * 2;
?>
<?php
  if (isset($_POST['new-username'])) {
    try {
      $connection = new PDO($dsn, $username, $password, $options);

      $newUser =  str_replace(['"',"'"], "", $_POST['new-username']);
      $newPassword = $_POST['new-password'];

      $sql = "INSERT INTO login VALUES ('$newUser', '$newPassword')";

      $connection->exec($sql);
      
      setcookie('loggedIn', $newUser, time()+ 60*60*24*2,'/');
      header('Location: ./index.php');
      
    }
    catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
  }

?>

<?php

  if (isset($_POST['username'])) {
    $postUser = $_POST["username"];
    $postPassword  = $_POST['password'];
    $sql =  "SELECT username, password FROM login WHERE username='$postUser'";;
    try{
        $connection = new PDO($dsn, $username, $password, $options);
        try{
            $tables = $connection->query($sql);
            $dbUser = $tables->fetch(PDO::FETCH_ASSOC);
            if($dbUser['password'] == $postPassword){
              
                setcookie('loggedIn', $postUser, time()+ 60*60*24*2,'/');
                header('Location: ./index.php');
                
            }
        }
        catch(PDOException $error) {
            echo $sql . "<br>" . $error->getMessage();
        }
    }
    catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
        }
    }

?>
  <?php
    function logout() {
      setcookie("loggedIn", '', time() - 60*60*24*2,'/');
      header("Location: index.php");
    }

    if (isset($_GET['logout'])) {
      logout();
    }
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
<html>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Assignment 3</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css"
      integrity="sha512-8bHTC73gkZ7rZ7vpqUQThUDhqcNFyYi2xgDgPDHc+GXVGHXq+xPjynxIopALmOPqzo9JZj0k6OqqewdGO3EsrQ=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js"
      integrity="sha512-dqw6X88iGgZlTsONxZK9ePmJEFrmHwpuMrsUChjAw1mRUhUITE5QU9pkcSox+ynfLhL15Sv2al5A0LVyDCmtUw=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>
  </head>
  <body>
    <!--[if lt IE 7]>
      <p class="browsehappy">
        You are using an <strong>outdated</strong> browser. Please
        <a href="#">upgrade your browser</a> to improve your experience.
      </p>
    <![endif]-->



    <div class="ui secondary pointing menu">
      <a class="item">
        Home
      </a>
      <div class="right menu">
        <a class="ui item" href='./index.php?logout=true'>
        <?php
        if(!isset($_COOKIE['loggedIn'])) {
          echo '';
        }
        else{
          echo 'Logout';
        }
        ?>
        </a>
      </div>
    </div>
    <div class="ui container">
