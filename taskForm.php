

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


<div class="ui top attached header" style="display:flex; justify-content:space-between;"><?php if (isset($taskID)) {echo 'Update task:';} else {echo 'Create task:';} ?> <a href="./index.php"><i class="close icon"></i></a></div>


<div class="ui attached segment">
  <form class="ui form" name="createVolunteerTask" method="POST" _lpchecked="1">
    <input type="hidden" name='action' id="action" value="updateTask">	
    <?php if (isset($taskID)) {
      echo '<input type="hidden" name="taskID" id="taskID" value="'.$taskID.'">'; 
    }  ?>
    <div class="field">
      <label>Name:</label>
      <input
        type="text"
        placeholder="Task name"
        name="taskName"
        id="taskName"
        required
        value="<?php if (isset($taskID)) {echo $taskName;}  ?>"
      />
    </div>

    <div class="field">
      <label>Description:</label>
      <textarea
        row="2"
        placeholder="Description"
        name="taskDescription"
        id="taskDescription"
        required
      ><?php if (isset($taskID)) {echo $taskDescription;}  ?></textarea>
    </div>
    <div class="field">
      <label>Location:</label>
      <input
        type="text"
        placeholder="Type task location here"
        name="location"
        id="location"
        required
        value="<?php if (isset($taskID)) {echo $location;}  ?>"
      />
    </div>

    <div class="three fields">
      <div class="field">
        <label>Date/Time:</label>
        <input
          type="datetime-local"
          placeholder="Type task date/time here"
          name="taskDateTime"
          required
          id="taskDateTime"
          value="<?php if (isset($taskID)) {echo date('Y-m-d\TH:i', strtotime($taskDateTime)); }  ?>"
        />
      </div>
      <div class="field">
        <label>Needed:</label>
        <input
          type="text"
          placeholder="Type task volunteers needed here"
          name="volunteersNeeded"
          id="volunteersNeededvolunteersMax"
          required
          value="<?php if (isset($taskID)) {echo $volunteersNeeded;}  ?>"
        />
      </div>
      <div class="field">
        <label>Max:</label>
        <input
          type="number"
          placeholder="Type task volunteers max here"
          name="volunteersMax"
          id="volunteersMax"
          required
          value="<?php if (isset($taskID)) {echo $volunteersMax;}  ?>"
        />
      </div>
    </div>
	<div class="field">
		<label>Currently Enrolled: <?php if (isset($taskID)) {echo $currentlyEnrolled;} else {echo 0;}   ?></label>
	</div>				
    <?php if (isset($taskID)) { ?>
    <button class="ui primary button" name="updateSubmit" id="updateSubmit" type='submit'>Update Task</button>
    <button class="ui primary button" name="deleteSubmit" id="deleteSubmit" type='submit'>Delete</button>	
    <?php } else { ?>
    <button class="ui primary button" name="createSubmit" id="createSubmit" type='submit'>Create Task</button>
    <?php } ?>
    
    
  </form>
</div>	

<br>
	