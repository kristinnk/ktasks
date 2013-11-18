<?php

	include "functions/mysql.php";

	$db = new MySQL_Class;	
	$db->ConnectToDB();	
	$update_query = "update tasks set 
	assigned_user='" . $_POST['u_id'] . "', 
	title='" . $_POST['task_title'] . "', 
	content='" . $_POST['task_content'] . "', 
	status='" . $_POST['numstatus'] . "' 
	where 
	id='" . $_POST['id'] . "'";
	
	print $update_query;
	mysql_query( $update_query );

	$db->CloseDBConnection();
	
	header('location:index.php');
?>
	