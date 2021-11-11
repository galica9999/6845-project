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
    $query = 'SELECT accountID, username, accountType, firstName, lastName
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

function add_account($username, $password) {
    global $db;
    $query = 'INSERT INTO accounts
                 (username, password, accountType, firstName, lastName, createDateTime)
              VALUES
                 (:username, :password, :accountType, :firstName, :lastName, now())';
    $statement = $db->prepare($query);
    $statement->bindValue(':username', $username);
    $statement->bindValue(':password', $password);
    $statement->bindValue(':accountType', 'user');
    $statement->bindValue(':firstName', 'Future version');
    $statement->bindValue(':lastName', 'Future version');
    $statement->execute();
    $statement->closeCursor();
}

function update_account($username, $password, $accounType, $firstName, $lastName) {
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