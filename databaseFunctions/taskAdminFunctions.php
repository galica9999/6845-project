<?php
function create_taskDetails($taskName, $taskDescription, $taskDateTime, $location, $volunteersNeeded, $volunteersMax) {
    global $db;
    $query = 'INSERT INTO tasks
                 (taskName, taskDescription, taskDateTime, location, volunteersNeeded, volunteersMax, createDateTime, updateDateTime)
              VALUES
                 (:taskName, :taskDescription, :taskDateTime, :location, :volunteersNeeded, :volunteersMax, now(), now())';		  
    $statement = $db->prepare($query);
    $statement->bindValue(':taskName', $taskName);
    $statement->bindValue(':taskDescription', $taskDescription);
	$statement->bindValue(':taskDateTime', $taskDateTime);
	$statement->bindValue(':location', $location);
	$statement->bindValue(':volunteersNeeded', $volunteersNeeded);
	$statement->bindValue(':volunteersMax', $volunteersMax);
    $statement->execute();
    $statement->closeCursor();
}

function update_taskDetails($taskID, $taskName, $taskDescription, $taskDateTime, $location, $volunteersNeeded, $volunteersMax) {
    global $db;
    $query = 'UPDATE tasks
				SET
				taskName=:taskName, taskDescription=:taskDescription, taskDateTime=:taskDateTime, 
				location=:location, volunteersNeeded=:volunteersNeeded, volunteersMax=:volunteersMax,
				updateDateTime=now()
              WHERE taskID=:taskID';
    $statement = $db->prepare($query);
    $statement->bindValue(':taskID', $taskID);	
    $statement->bindValue(':taskName', $taskName);
    $statement->bindValue(':taskDescription', $taskDescription);
	$statement->bindValue(':taskDateTime', $taskDateTime);
	$statement->bindValue(':location', $location);
	$statement->bindValue(':volunteersNeeded', $volunteersNeeded);
	$statement->bindValue(':volunteersMax', $volunteersMax);
    $statement->execute();
    $statement->closeCursor();
}

function delete_taskDetails($taskID) {
    global $db;
    $query = 'DELETE FROM tasks
			  WHERE taskID = :taskID';
    $statement = $db->prepare($query);
    $statement->bindValue(':taskID', $taskID);
    $statement->execute();
    $statement->closeCursor();
}

?>