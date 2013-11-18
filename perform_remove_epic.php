<?php

	include "functions/mysql.php";

	$db = new MySQL_Class;	
	$db->ConnectToDB();	
	
	$delete_query = "delete from epics where id=" . $_GET['id'];
	mysql_query( $delete_query );
	$select_query = "select * from stories where parent_id=" . $_GET['id'];
	$results = mysql_query( $select_query );
	while ( $row = mysql_fetch_assoc( $results ) )
	{
		$delete_query = "delete from tasks where parent_id=" . $row['id'];
		mysql_query( $delete_query );
	}
	$delete_query = "delete from stories where parent_id=" . $_GET['id'];
	mysql_query( $delete_query );
	$db->CloseDBConnection();	

	header('location:index.php');

?>