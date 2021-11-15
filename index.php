<?php include "templates/header.php";?>



<?php 
//debug 00webhosts databae connection
//require "./databaseFunctions/accountFunctions.php";
//$validateInd = get_accounts();
//if (isset($validateInd)) {$test = 'yes' ;} else {$test = 'no';}
//echo $test;
//foreach($validateInd as $singleTask){	
//            $username = $singleTask['username'];
//}
//echo $username;
//echo 'data should be above';


//convert form/get scope variable to local variable
if (filter_input(INPUT_POST, 'action') !== NULL) {
	$action = filter_input(INPUT_POST, 'action');
} elseif (filter_input(INPUT_GET, 'action') !== NULL) {
	$action = filter_input(INPUT_GET, 'action');
}
//convert form/get scope variable to local variable
if (filter_input(INPUT_POST, 'taskID') !== NULL) {
	$taskID = filter_input(INPUT_POST, 'taskID');
} elseif (filter_input(INPUT_GET, 'taskID') !== NULL) {
	$taskID = filter_input(INPUT_GET, 'taskID');
}

// If user isn't logged in then default to login page
if(!isset($_COOKIE['loggedIn'])) {
  include "./login.php";

// If user is logged in, then if an action variable exists then perform the action
} elseif (isset($action)) {
	switch ($action) {
		// Task details page
		case "taskDetails":
			include "./taskDetails.php";
			echo "taskDetails";
			break;
			
		// Task administration
		case "taskForm":
			include "./taskForm.php";
			break;
		case "addTask":
			include "./databaseFunctions/taskAdminFunctions.php";
			if (isset($_POST['taskName'])) {
				create_taskDetails($_POST['taskName'], $_POST['taskDescription'], $_POST['taskDateTime'], $_POST['location'], $_POST['volunteersNeeded'], $_POST['volunteersMax']);
			} else {
				echo 'need to add error handling';
			}
			header('Location: ./index.php');
			break;
		case "updateTask":
			include "./databaseFunctions/taskAdminFunctions.php";
			if (isset($_POST['taskName'])) {
				update_taskDetails($_POST['taskID'], $_POST['taskName'], $_POST['taskDescription'], $_POST['taskDateTime'], $_POST['location'], $_POST['volunteersNeeded'], $_POST['volunteersMax']);
			} else {
				echo 'need to add error handling';
			}
			include "./tasks.php";
			break;
		case "deleteTask":
			include "./databaseFunctions/taskAdminFunctions.php";
			delete_taskDetails($taskID);
			include "./tasks.php";
			break;
		
		// User registration
		case "register":
			include "./databaseFunctions/taskUserFunctions.php";
			register_task($taskID);
			include "./tasks.php";
			break;
		case "unregister":
			include "./databaseFunctions/taskUserFunctions.php";
			unregister_task($taskID);
			include "./tasks.php";
			break;
		
		// User Profile actions. Maybe included in future version
		case "userProfile":
			echo "userProfile";
			break;
		case "updateAccount":
			echo "updateAccount";
			break;
		
		// Admins view to update/delete accounts. Maybe included in future version
		case "userAdmin":
			echo "userAdmin";
			break;
		default:
		   echo "Error: Action variable exists but no value. This should never happen";
		   include "./tasks.php";
	}
// If user is logged and no action is specified then default to task list
} else {
  include "./tasks.php";
}


?>

<?php include "templates/footer.php";?>
