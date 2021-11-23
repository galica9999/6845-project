

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


<h3 class="ui top attached header">Create Task</h3>
<div class="ui attached segment">
  <form class="ui form" name="createVolunteerTask" method="POST" _lpchecked="1">
    <input type="hidden" name="action" id="action" value="addTask" />

    <div class="field">
      <label>Name:</label>
      <input
        type="text"
        placeholder="Task name"
        name="taskName"
        id="taskName"
        value=""
      />
    </div>

    <div class="field">
      <label>Description:</label>
      <textarea
        row="2"
        placeholder="Description"
        name="taskDescription"
        id="taskDescription"
      ></textarea>
    </div>
    <div class="field">
      <label>Location:</label>
      <input
        type="text"
        placeholder="Type task location here"
        name="location"
        id="location"
        value=""
      />
    </div>

    <div class="three fields">
      <div class="field">
        <label>Date/Time:</label>
        <input
          type="datetime-local"
          placeholder="Type task date/time here"
          name="taskDateTime"
          id="taskDateTime"
        />
      </div>
      <div class="field">
        <label>Needed:</label>
        <input
          type="text"
          placeholder="Type task volunteers needed here"
          name="volunteersNeeded"
          id="volunteersNeededvolunteersMax"
          value=""
        />
      </div>
      <div class="field">
        <label>Max:</label>
        <input
          type="number"
          placeholder="Type task volunteers max here"
          name="volunteersMax"
          id="volunteersMax"
          value=""
        />
      </div>
    </div>

    <button class="ui primary button" name="submit" id="submit" type="submit">
      Create
    </button>
  </form>
</div>

	