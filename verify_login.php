<?php

	include "functions/mysql.php";

	$db = new MySQL_Class;	
	$db->ConnectToDB();	
	
	$check_query = "select * from users where name='" . $_POST['username'] . "' limit 1";
	$results = mysql_query( $check_query );
	if ( mysql_num_rows( $results ) == 0 )
	{
		header('location:login.php?failed=2,' . $check_query);
	}
	else
	{		
		$row = mysql_fetch_assoc( $results );		
		$password = $_POST['password'];		
		$salt = substr($row['password'], 0, 64);
		$hash = $salt . $password;
		
		for ( $i=0; $i < 100; $i++ )
		{
			$hash = hash('sha256', $hash);	
		}
		
		$hash = $salt . $hash;
		if ( $hash == $row['password'] )
		{	
			setcookie( 'kTasks_user', $row['id'], time()+60*60*24*30 );
			header('location:index.php');
		}
		else
		{			
			header('location:login.php?failed=1');
		}
		
	}
	
	$db->CloseDBConnection();
	
	//header('location:index.php');
?>
	