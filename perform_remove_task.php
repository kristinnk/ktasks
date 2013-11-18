<?php

	include "functions/mysql.php";

	$db = new MySQL_Class;	
	$db->ConnectToDB();	
	
$insert_query = "delete from tasks where id=" . $_GET['id'];
	mysql_query( $insert_query );

	$db->CloseDBConnection();	

	header('location:index.php');

?>