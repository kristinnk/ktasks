<?php

	include "functions/mysql.php";

	$db = new MySQL_Class;	
	$db->ConnectToDB();	
	
	$delete_query = "delete from stories where id=" . $_GET['id'];
	mysql_query( $delete_query );
	$delete_query = "delete from tasks where parent_id=" . $_GET['id'];
	mysql_query( $delete_query );

	$db->CloseDBConnection();	

	header('location:index.php');

?>