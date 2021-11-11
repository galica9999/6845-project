<?php
//require "./commentConfig.php";
  require "./databaseFunctions/taskFunctions.php";
?>

      <h3 class="ui top attached header">Comments</h3>
      <div class="ui attached segment">
        <div class="ui list celled large">

<?php
  if (isset($_POST['taskName'])) {
    try {
		create_taskDetails($_POST['taskName'], $_POST['taskDescription'], $_POST['taskDateTime'], $_POST['location'], $_POST['volunteersNeeded'], $_POST['volunteersMax']);
    }
    catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
  }
?>



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
			echo "
			<div class='item'>
				<img class='ui avatar image' src='https://robohash.org/".$strippedTaskName.$strippedTime.".png'>
				<div class='content'>
					<div class='header'>"
						.$taskName
					."</div>"
					.$taskDateTime
					." Volunteers Needed: "
					.$volunteersNeeded 
					." Volunteers Max: "
					.$volunteersMax
					." Task Id to pass to register/unregister hyperlink: "
					.$taskID
					."<a href=index.php?action=deleteTask&taskID="
					.$taskID
					.">DELETE THIS TASK</a>
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
    
	
	<!-- START - delete the form code below once a proper create task form is put into place for admin -->
	<div class="ui bottom attached header">
		<form class="ui form" name="insert new record test" method='POST'>
			<div class="inline fields">
				<div >
					<label>New task test: </label>
					<input type="text" placeholder="Type task name here" name='taskName' id="taskName">
					<input type="text" placeholder="Type task description here" name='taskDescription' id="taskDescription">
					<input type="datetime-local" placeholder="Type task date/time here" name='taskDateTime' id="taskDateTime">
					<input type="text" placeholder="Type task location here" name='location' id="location">
					<input type="text" placeholder="Type task volunteers needed here" name='volunteersNeeded' id="volunteersNeededvolunteersMax">
					<input type="number" placeholder="Type task volunteers max here" name='volunteersMax' id="volunteersMax">
				</div>
				<button class="ui primary button" name="submit" id="submit" type='submit'>
				</button>
			</div>
		</form>
	</div>
	<!-- END - delete the form code above once a proper create task form is put into place for admin -->


<?php include "templates/footer.php";?>