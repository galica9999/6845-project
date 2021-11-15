<?php

function register_task($taskID) {
    global $db;
    $query = 'INSERT INTO taskassignment
				(taskID, accountID, createDateTime, updateDateTime)
              VALUES
                 (:taskID, :accountID, now(), now())';
    $statement = $db->prepare($query);
    $statement->bindValue(':taskID', $taskID);
    $statement->bindValue(':accountID', getCookieData('accountID'));
    $statement->execute();
    $statement->closeCursor();
}

function unregister_task($taskID) {
    global $db;
    $query = 'DELETE FROM taskassignment
			 WHERE taskID = :taskID
			 AND accountID = :accountID';
    $statement = $db->prepare($query);
    $statement->bindValue(':taskID', $taskID);
    $statement->bindValue(':accountID', getCookieData('accountID'));
    $statement->execute();
    $statement->closeCursor();
}
?>