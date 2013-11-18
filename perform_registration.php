<?php

	include "functions/mysql.php";

	if ( isset($_POST['username'] ) )	
	{
		$db = new MySQL_Class;	
		$db->ConnectToDB();	
		$query = "select * from users where name='" . $_POST['username'] . "';";
		$results = $db->query( $query );				
		if ( mysql_num_rows($results) == 0 )
		{				
			if ( $_POST['password_1'] == $_POST['password_2'] )
			{
				if ( $_POST['correct_sum'] == $_POST['human_sum'] )			
				{
						$username = $_POST['username'];	
						$password = $_POST['password_1'];
						
						//Hash the password.
						$salt = hash('sha256', uniqid(mt_rand(), true) . 'kTasksIsCool' . strtolower($username));						
						$hash = $salt . $password;
						
						for ( $i=0; $i < 100; $i++ )
						{
							$hash = hash('sha256', $hash);	
						}
						
						$password = $salt . $hash;						
						
						$insert_query = "insert into users values ('', '" . mysql_real_escape_string($username) . "', '" . mysql_real_escape_string($password) . "')";	
						mysql_query( $insert_query );
						header('location:registration_complete.php');
						$db->CloseDBConnection();			
				}
				else
				{
					header('location:register.php?fail=3');
					$db->CloseDBConnection();
				}
			}
			else
			{
				header('location:register.php?fail=2');
				$db->CloseDBConnection();
			}
		}
		else
		{
		header('location:register.php?fail=4');
		$db->CloseDBConnection();
		}
	}
	else
	{
		header('location:register.php?fail=1');
		$db->CloseDBConnection();
	}
	$db->CloseDBConnection();

	//print $insert_query;
	
	
?>
	