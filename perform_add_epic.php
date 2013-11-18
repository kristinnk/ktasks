<?php

	include "functions/mysql.php";

	$db = new MySQL_Class;	
	$db->ConnectToDB();	
	
	$insert_query = "insert into epics values ('', '" . mysql_real_escape_string($_POST['epic_title']) . "', '" . mysql_real_escape_string($_POST['epic_description']) . "', " . $_POST['epic_assigned_user'] . ")";	
	mysql_query( $insert_query );
	
	$db->CloseDBConnection();
	//print $insert_query;
	
	header('location:index.php');
?>
	