drop database kTasks;
create database kTasks;
use kTasks;

create table users (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(30) NOT NULL,
	password VARCHAR(256) NOT NULL
);

insert into users values (
	'',
	'Talmir',
	'beholder'
);

insert into users values (
	'',
	'Kristinn',
	'bucketofotters'
);

insert into users values (
	'',
	'madpalu',
	'darktech'
);

create table epics (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,	
	title VARCHAR(256) NOT NULL,
	description MEDIUMBLOB,
	assigned_user INT NOT NULL
);

insert into epics values (
	'',
	'kTasks',
	'A tiny task manager',
	1
);

create table stories (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,	
	parent_id INT NOT NULL,
	assigned_user INT NOT NULL,	
	title VARCHAR(128) NOT NULL,
	content VARCHAR(512),
	status INT NOT NULL
);

insert into stories values (
	'',
	1,
	1,
	'Create the database',
	'Create the database used with kTasks.',
	1
);

insert into stories values (
	'',
	1,
	1,
	'Create the user login system',
	'Create the functionality for users to log in and out.',
	0
);

create table tasks (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	parent_id INT NOT NULL,
	assigned_user INT NOT NULL,
	title VARCHAR(30) NOT NULL,
	content VARCHAR(512),
	status INT NOT NULL
);

insert into tasks values (
	'',
	1,
	1,
	'Create the initial database',
	'Write a script that creates the initial database',
	0
);

insert into tasks values (
	'',
	1,
	1,
	'A test task',
	'A task to test',
	0
);

insert into tasks values (
	'',
	2,
	1,
	'Create the initial frontpage',
	'Create the initial frontpage with a login form',
	0
);