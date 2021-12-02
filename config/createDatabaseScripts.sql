-- Create the CVSC database
DROP DATABASE IF EXISTS CVSC;
CREATE DATABASE CVSC;
USE CVSC;  -- MySQL command

-- Create User Accounts table
CREATE TABLE accounts (
  accountID			INT(11)		NOT NULL	AUTO_INCREMENT	COMMENT 'account id used for registering  user to task',
  username			CHAR(50)	NOT NULL	UNIQUE COMMENT 'unique account name. No two accounts can have the same username.',
  password			TEXT		NOT NULL	COMMENT 'Account password.',
  name				CHAR(100)	NOT NULL	COMMENT 'Name of the accounts owner',
  accountType		CHAR(50)	NOT NULL	COMMENT 'Account type determins if the person is a user or admin. Valid values are admin or user',
  createDateTime	DATETIME	NOT NULL	COMMENT 'When the record was first created.',
  updateDateTime	DATETIME	NOT NULL	COMMENT 'When the record was last updated.',
  PRIMARY KEY (accountID)
);

-- create the Tasks table
CREATE TABLE tasks (
  taskID			INT(11)		NOT NULL	AUTO_INCREMENT COMMENT 'unique task id. Allows for events to have the same name.',
  taskName			CHAR(255)	NOT NULL	COMMENT 'The task name.',
  taskDescription	TEXT		NOT NULL	COMMENT 'The task description.',
  taskDateTime		DATETIME	NOT NULL	COMMENT 'The date and time when the task will be held.',
  location			CHAR(255)	NOT NULL	COMMENT 'Location of the task.',
  volunteersNeeded	SMALLINT(1)	NOT NULL	COMMENT 'Number of volunteers needed.',
  volunteersMax		SMALLINT(1)	NOT NULL	COMMENT 'Maxium number of volunteers allowed to signup.',
  createDateTime	DATETIME	NOT NULL	COMMENT 'When the record was first created.',
  updateDateTime	DATETIME	NOT NULL	COMMENT 'When the record was last updated.',
  PRIMARY KEY (taskID)
);
--Trigger for records in taskassignment to be deleted if its parent record in tasks is deleted
DROP TRIGGER IF EXISTS task_taskassignment_delete;
DELIMITER $$  
 
CREATE TRIGGER task_taskassignment_delete  
AFTER DELETE  
ON tasks FOR EACH ROW  
BEGIN  
  DELETE FROM taskassignment WHERE taskassignment.taskID = OLD.taskID;
END$$   
  
DELIMITER ;  

-- create the Tasks table
CREATE TABLE taskassignment (
  taskID			INT(11)		NOT NULL	COMMENT 'unique task id that user is registered for.',
  accountID			INT(11)		NOT NULL	COMMENT 'unique account id assigned to the task registered for'  ,
  createDateTime	DATETIME	NOT NULL	COMMENT 'When the record was first created.',
  updateDateTime	DATETIME	NOT NULL	COMMENT 'When the record was last updated.',
  PRIMARY KEY (taskID, accountID)
);

-- create the users and grant priveleges to those users
GRANT SELECT, INSERT, DELETE, UPDATE
ON CVSC.*
TO mgs_user@localhost
IDENTIFIED BY 'pa55word';

INSERT INTO tasks
                 (taskName, taskDescription, taskDateTime, location, volunteersNeeded, volunteersMax, createDateTime, updateDateTime)
              VALUES
                 ('Task Name 1', 'Task description 1', now(), 'task location 1', '10', '20', now(), now());	

INSERT INTO tasks
                 (taskName, taskDescription, taskDateTime, location, volunteersNeeded, volunteersMax, createDateTime, updateDateTime)
              VALUES
                 ('Task Name 2', 'Task description 2', now(), 'task location 2', '20', '30', now(), now());	


INSERT INTO tasks
                 (taskName, taskDescription, taskDateTime, location, volunteersNeeded, volunteersMax, createDateTime, updateDateTime)
              VALUES
                 ('Task Name 3', 'Task description 3', now(), 'task location 3', '30', '40', now(), now());	

INSERT INTO tasks
                 (taskName, taskDescription, taskDateTime, location, volunteersNeeded, volunteersMax, createDateTime, updateDateTime)
              VALUES
                 ('Task Name 4', 'Task description 4', now(), 'task location 4', '40', '50', now(), now());	