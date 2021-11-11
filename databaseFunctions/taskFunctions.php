<?php
function get_tasks() {
    global $db;
    $query = 'SELECT taskID, taskName, taskDateTime,
			  volunteersNeeded, volunteersMax
			  FROM tasks
              ORDER BY taskDateTime DESC';
    $statement = $db->prepare($query);
    $statement->execute();
    $tasks = $statement->fetchAll();
    $statement->closeCursor();
	return $tasks;
}	
	
function get_tasksDetails($taskID) {
    global $db;
    $query = 'SELECT taskID, taskName, taskDescription, taskDateTime,
			  location, volunteersNeeded, volunteersMax,
			  createDateTime, updateDateTime
			  FROM tasks
			  WHERE taskID = :taskID';
    $statement = $db->prepare($query);
    $statement->bindValue(':taskID', $taskID);
    $statement->execute();
    $taskDetails = $statement->fetchAll();
    $statement->closeCursor();
	return $taskDetails;
}

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

function update_taskDetails($taskName, $taskDescription, $taskDateTime, $location, $volunteersNeeded, $volunteersMax) {
    global $db;
    $query = 'UPDATE tasks
	accountID, username, accountType, firstName, lastName
                 (username, password, accountType, firstName, lastName, updateDateTime)
              VALUES
                 (:taskName, :taskDescription, :taskDateTime, :location, :volunteersNeeded, :volunteersMax now())';
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

function delete_taskDetails($taskId) {
    global $db;
    $query = 'DELETE FROM tasks
			  WHERE taskId = :taskId';
    $statement = $db->prepare($query);
    $statement->bindValue(':taskId', $taskId);
    $statement->execute();
    $statement->closeCursor();
}

function register_task($username, $password, $accounType, $firstName, $lastName) {
    global $db;
    $query = 'UPDATE accounts
	accountID, username, accountType, firstName, lastName
                 (username, password, accountType, firstName, lastName, createDateTime)
              VALUES
                 (:username, :password, :accountType, :firstName, :lastName, now())';
    $statement = $db->prepare($query);
    $statement->bindValue(':username', $username);
    $statement->bindValue(':password', $password);
    $statement->bindValue(':accountType', $accounType);
    $statement->bindValue(':firstName', $firstName);
    $statement->bindValue(':lastName', $lastName);
    $statement->execute();
    $statement->closeCursor();
}

function unregister_task($username, $password, $accounType, $firstName, $lastName) {
    global $db;
    $query = 'UPDATE accounts
	accountID, username, accountType, firstName, lastName
                 (username, password, accountType, firstName, lastName, createDateTime)
              VALUES
                 (:username, :password, :accountType, :firstName, :lastName, now())';
    $statement = $db->prepare($query);
    $statement->bindValue(':username', $username);
    $statement->bindValue(':password', $password);
    $statement->bindValue(':accountType', $accounType);
    $statement->bindValue(':firstName', $firstName);
    $statement->bindValue(':lastName', $lastName);
    $statement->execute();
    $statement->closeCursor();
}
?>