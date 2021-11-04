<?php include "templates/header.php";?>

<?php 

if(!isset($_COOKIE['loggedIn'])) {
  include "./login.php";
}
else{
  include "./comments.php";
}
?>

<?php include "templates/footer.php";?>
