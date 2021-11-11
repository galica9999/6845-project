<?php include "templates/header.php";?>

<?php 


// Action that prompts user to log in if session does not exist
if(!isset($_COOKIE['loggedIn'])) {
//  get_accounts();
  include "./login.php";
}
// Action that displays available tasks to registered
else{
  include "./tasks.php";
echo 'YOURE LOGGED IN';
}
?>

<?php include "templates/footer.php";?>
