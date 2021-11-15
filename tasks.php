<?php
  require "./databaseFunctions/taskDisplayFunctions.php";
?>

      <h3 class="ui top attached header">Volunteer Tasks</h3>
	  <!-- Temporary location until team decides where to put it -->
	  
<?php 
	if (getCookieData('accountType') == "admin") {
		echo '<div class="ui attached segment"><a href=index.php?action=taskForm>Create Task</a></div>';
	}  
?>	  
      <div class="ui attached segment">
        <div class="ui list celled large">


<?php 
		
					
			


  try {

    try {
		$tasks = get_tasks();
        if($tasks){
          foreach($tasks as $singleTask){	
            $taskID = $singleTask['taskID'];
            $taskName = $singleTask['taskName'];            
            $taskDateTime = $singleTask['taskDateTime'];
            $volunteersNeeded = $singleTask['volunteersNeeded'];
            $volunteersMax = $singleTask['volunteersMax'];
			$strippedTaskName =  str_replace([' '," ",'-'], "", $taskName);
            $strippedTime = str_replace([':'," "], "", $taskDateTime);
			$registered_ind = $singleTask['registered_ind'];
			if ($registered_ind == 'Y') {
				$registrationURL = '<a href=index.php?action=unregister&taskID='.$taskID.'>UNREGISTER</a>';
			} else {
				$registrationURL = '<a href=index.php?action=register&taskID='.$taskID.'>REGISTER</a>';
			}
			if (getCookieData('accountType') == "admin") {
				$updateTaskURL = '<a href=index.php?action=taskForm&taskID='.$taskID.'>EDIT THIS TASK</a>';
			} else {
				$updateTaskURL = '';
			}

			echo "
			<div class='item'>
				<img class='ui avatar image' src='https://robohash.org/".$strippedTaskName.$strippedTime.".png'>
				<div class='content'>
					<div class='header'>"
						.$taskName
					."</div> Date of volunteer event: "
					.$taskDateTime
					." -  Volunteers Needed: "
					.$volunteersNeeded 
					." - Volunteers Max: "
					.$volunteersMax
					." - Task Id: "
					.$taskID
					." ----- <a href=index.php?action=deleteTask&taskID="
					.$taskID
					.">DELETE THIS TASK</a>"
					." -----"
					.$updateTaskURL
					."-----"
					.$registrationURL
					."
				</div>
			</div>";
          }
        }
    }
    catch(PDOException $error) {
      echo $sql . "<br>" . $error->getMessage();
    }
  }
  catch(PDOException $error) {
      echo $sql . "<br>" . $error->getMessage();
  }
?>
		</div>
	</div>
	<br>
	<br>

