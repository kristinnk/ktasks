<?php

	class MySQL_Class {
		
		var $m_db;
		var $m_host;
		var $m_username;
		var $m_pass;
		var $m_dbName;
		
		function ConnectToDB()
		{
			$m_host = "localhost";
			$m_username = "tmp";
			$m_pass = "tmp";
			$m_dbName = "kTasks";			
		
			$m_db = mysql_connect($m_host, $m_username, $m_pass);
			if ( !$m_db )
			{
				die("Could not connect to the database.");
			}
			mysql_select_db( $m_dbName, $m_db );
			
		}
	
		function CloseDBConnection()
		{
			mysql_close( $m_db );
		}
		
		function sayHello( $hello )
		{
			$bye = "Bye";
			print $hello;
		}

		function query( $sql_query )
		{			
			$output = mysql_query( $sql_query );				
			if ( !$output )
			{
				print("Query failed : " . mysql_error());
			}
			return $output;
		}				
	};

?>
