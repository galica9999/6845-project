<?php

//$accountID
function get_tasks() {
    global $db;
    $query = 'SELECT tasks.taskID, tasks.taskName, tasks.taskDateTime, tasks.taskDescription,
			  tasks.volunteersNeeded, tasks.volunteersMax, tasks.location,
			  CASE WHEN taskassignment.taskID IS NULL THEN \'N\' ELSE \'Y\' END AS registered_ind,
              (SELECT COUNT(taskassignment.accountID) FROM taskassignment
               WHERE taskassignment.taskID = tasks.taskID) currentlyEnrolled
    		  FROM tasks
			  LEFT JOIN taskassignment
			  ON tasks.taskID = taskassignment.taskID 
			  AND taskassignment.accountID = :accountID
              ORDER BY taskDateTime DESC';
    $statement = $db->prepare($query);
    $statement->bindValue(':accountID', getCookieData('accountID'));
    $statement->execute();
    $tasks = $statement->fetchAll();
    $statement->closeCursor();
	return $tasks;
}	
	
function get_tasksDetails($taskID) {
    global $db;
    $query = 'SELECT tasks.taskID, tasks.taskName, tasks.taskDescription, tasks.taskDateTime,
			  tasks.location, tasks.volunteersNeeded, tasks.volunteersMax,
			  tasks.createDateTime, tasks.updateDateTime,
              (SELECT COUNT(taskassignment.accountID) FROM taskassignment
               WHERE taskassignment.taskID = tasks.taskID) currentlyEnrolled
			  FROM tasks
			  WHERE taskID = :taskID';
    $statement = $db->prepare($query);
    $statement->bindValue(':taskID', $taskID);
    $statement->execute();
    $taskDetails = $statement->fetchAll();
    $statement->closeCursor();
	return $taskDetails;
}

?>