

<?php
if (isset($taskID)) {
	require "./databaseFunctions/taskDisplayFunctions.php";
	$taskDetails = get_tasksDetails($taskID);
	foreach($taskDetails as $singleTask){	
		$taskID = $singleTask['taskID'];
		$taskName = $singleTask['taskName'];  
		$taskDescription = $singleTask['taskDescription']; 		
		$taskDateTime = $singleTask['taskDateTime'];
		$location = $singleTask['location'];
		$volunteersNeeded = $singleTask['volunteersNeeded'];
		$volunteersMax = $singleTask['volunteersMax'];
		$currentlyEnrolled = $singleTask['currentlyEnrolled'];
		$strippedTaskName =  str_replace([' '," ",'-'], "", $taskName);
		$strippedTime = str_replace([':'," "], "", $taskDateTime);
	}
}
?>


	<div class="ui bottom attached header">
		<form class="ui form" name="createVolunteerTask" method='POST'>
			<div class="inline fields">
				<div >
					<label><?php if (isset($taskID)) {echo 'Update task:';}  ?></label>
					<input type="hidden" name='action' id="action" 
					value="<?php if (isset($taskID)) {echo 'updateTask';} else {echo 'addTask';}  ?>"
					>
					
					
					
					<?php if (isset($taskID)) {
						echo '<input type="hidden" name="taskID" id="taskID" value="'.$taskID.'">'; 
					}  ?>
					
					
					
					<input type="text" placeholder="Type task name here" name='taskName' id="taskName"
					value="<?php if (isset($taskID)) {echo $taskName;}  ?>"
					>
					<input type="text" placeholder="Type task description here" name='taskDescription' id="taskDescription" 
					value="<?php if (isset($taskID)) {echo $taskDescription;}  ?>"
					>
					<input type="datetime-local" placeholder="Type task date/time here" name='taskDateTime' id="taskDateTime"
					value="<?php if (isset($taskID)) {echo date('Y-m-d\TH:i', strtotime($taskDateTime)); }  ?>"
					>
					<input type="text" placeholder="Type task location here" name='location' id="location"
					value="<?php if (isset($taskID)) {echo $location;}  ?>"
					>
					<input type="text" placeholder="Type task volunteers needed here" name='volunteersNeeded' id="volunteersNeededvolunteersMax"
					value="<?php if (isset($taskID)) {echo $volunteersNeeded;}  ?>"
					>
					<input type="number" placeholder="Type task volunteers max here" name='volunteersMax' id="volunteersMax"
					value="<?php if (isset($taskID)) {echo $volunteersMax;}  ?>"
					>
					<label>Currently Enrolled: <?php if (isset($taskID)) {echo $currentlyEnrolled;} else {echo 0;}   ?></label>
					 
				</div>
				<button class="ui primary button" name="submit" id="submit" type='submit'>
				</button>
			</div>
		</form>
	</div>
	