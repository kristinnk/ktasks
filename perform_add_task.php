<?php

	include "functions/mysql.php";

	$db = new MySQL_Class;	
	$db->ConnectToDB();	
	
	$insert_query = "insert into tasks values ('', " . $_POST['parent_id'] . ", " . $_POST['task_assigned_user'] . ", '" . mysql_real_escape_string($_POST['task_title']) . "', '" . mysql_real_escape_string($_POST['task_content']) . "', 0)";
	mysql_query( $insert_query );

	$db->CloseDBConnection();
	
	header('location:index.php');
?>
	