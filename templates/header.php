<?php ob_start(); ?>
<?php 
require "./config/databaseConfig.php";
require "./databaseFunctions/cookieFunctions.php";
//$lifetime = 60 * 60 * 24 * 2;
?>
<?php
  if (isset($_POST['new-username'])) {
    require "./databaseFunctions/accountFunctions.php";
	try {
      $newUser =  str_replace(['"',"'"], "", $_POST['new-username']);
      $newPassword = $_POST['new-password'];
      $validateInd = validate_accountExists($newUser) ;
	  if(!empty($validateInd)){
		header('Location: ./index.php?loginError=accountExists');
	  } else {
		add_account($newUser, $newPassword);
		$validateInd = validate_account($newUser, $newPassword);
		if(!empty($validateInd)){
			setCookieData($validateInd);
			header('Location: ./index.php');
		} else {
			echo 'failure';
			header('Location: ./index.php?loginError=newAccountError');
		}
	  }
    }
    catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
  }
?>

<?php
  if (isset($_POST['username'])) {
    require "./databaseFunctions/accountFunctions.php";
	$postUser = $_POST['username'];
    $postPassword  = $_POST['password'];
        try{
			$validateInd = validate_account($postUser, $postPassword);
			if(!empty($validateInd)){
				setCookieData($validateInd);
				header('Location: ./index.php');
			} else {
				echo 'failure';
				header('Location: ./index.php?loginError=badAcccountPW');
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
    <title>Community Volunteer Service Center</title>
	<title>The Clean Roads Project</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
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
  <body style="size:1040px;height:660px; background: url(./images/H58-road.gif)no-repeat; background-size: cover; opacity: 0.99;">
    <!--[if lt IE 7]>
      <p class="browsehappy">
        You are using an <strong>outdated</strong> browser. Please
        <a href="#">upgrade your browser</a> to improve your experience.
      </p>
    <![endif]-->



    <!-- temporarly adding the below class so we can see the home and login link. Ask Ryan on how best to do this. -->
	<div class="ui attached segment">
		<div class="ui secondary pointing menu">

		

		  <a class="left menu">
			<a href='./index.php'><img src="./images/CG2.png" alt="Cleaner & Greener Image file" height="033" width="133"/></a>
			<a class="ui item" href='./index.php'>Home</a>
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
	</div>
 <div>
  <img src="./images/H58-road.gif" alt="" style="height:100vh; width:100%; position:absolute;" z-index=-1>
  <div style="background-color:rgba(0,0,0,.5); position:relative; height:100vh" z-index=2>
  	<header z-index=3 style="position:relative;">
	
		<br><h1><center>The Clean Roads Project</center></h1>
		<h2><center>Clean roads are safer roads!</center></h2><br>	
	</header>

    <div class="ui container" style='position:relative'>
