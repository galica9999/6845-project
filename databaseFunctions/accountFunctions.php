<?php
function get_accounts() {
    global $db;
    $query = 'SELECT * FROM accounts
              ORDER BY createDateTime DESC';
    $statement = $db->prepare($query);
    $statement->execute();
    $users = $statement->fetchAll();
    $statement->closeCursor();
    return $users;
}

function validate_account($postUser, $postPassword) {
    global $db;
    $query = 'SELECT accountID, username, accountType, name, createDateTime, updateDateTime
			  FROM accounts
              WHERE username = :username
              AND password = :password';
    $statement = $db->prepare($query);
    $statement->bindValue(':username', $postUser);
    $statement->bindValue(':password', $postPassword);
    $statement->execute();
    $validateInd = $statement->fetchAll();
    $statement->closeCursor();
    return $validateInd;
}

function validate_accountExists($username) {
    global $db;
    $query = 'SELECT accountID, username FROM accounts
              WHERE username = :username';
    $statement = $db->prepare($query);
    $statement->bindValue(':username', $username);
    $statement->execute();
    $validateInd = $statement->fetchAll();
    $statement->closeCursor();
    return $validateInd;
}

function add_account($username, $password, $name) {
    global $db;
    $query = 'INSERT INTO accounts
                 (username, password, accountType, name, createDateTime, updateDateTime)
              VALUES
                 (:username, :password, :accountType, :name, now(), now())';
    $statement = $db->prepare($query);
    $statement->bindValue(':username', $username);
    $statement->bindValue(':password', $password);
    $statement->bindValue(':accountType', 'user');
    $statement->bindValue(':name', $name);
    $statement->execute();
    $statement->closeCursor();
}

function update_account($username, $password, $accounType, $name) {
    global $db;
    $query = 'UPDATE accounts
				SET
				name=:name
				updateDateTime=now()
              WHERE accountID=:accountID';   
	$statement = $db->prepare($query);
    $statement->bindValue(':accountID', $accountID);
    $statement->bindValue(':name', $name);
    $statement->execute();
    $statement->closeCursor();
}
?>