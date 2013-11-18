<html>
	
	<title>kTasks, Omg, the TASKS!</title>
	<LINK REL=StyleSheet HREF="css/style.css">

	<?php
	include "functions/mysql.php";

	$db = new MySQL_Class;	
	$db->ConnectToDB();	
	
	$currently_used_id = $_GET['task_id'];
	
	$query = "select * from tasks where id=" . $currently_used_id;
	$results = mysql_query( $query );
	$row = mysql_fetch_assoc( $results );
	
	?>		

	<body background="img/creampaper_gray.jpg">
		<center>
			
			<table cellspacing=0 width=400 bgcolor=lightblue>
				<tr>
					<td>
				<b>Edit task # <?php print $_GET['task_id']; ?></b>
					</td>
				</tr>
				<tr>
					<td background='img/lined_paper.jpg'>						
						<center>
							<table style="border : 0px;" width=90%> 
								<tr><td align=left>
									<form action="save_task.php" method="post">
										<input type="hidden" name="id" value='<?php echo $_GET['task_id']; ?>'>
										<b>Title :</b> <input type="text" name="task_title" value="<?php echo $row['title']; ?>">
										<br><b>Description : </b> <br>
										<textarea cols=40 rows="10" name="task_content"><?php echo $row['content']; ?></textarea>
										
										<b>Assign to user</b> : 
										<input type="hidden" name="u_id" value="<?php echo $_COOKIE['kTasks_user']; ?>"><br>
										<b>Current status : </b> 
										<select name='numstatus'>
											<option value='0'>Inactive</option>
											<option value='1'>In progress</option>
											<option value='2'>Ready for testing</option>
											<option value='3'>In testing</option>
											<option value='4'>Done</option>
										</select>
										<br>
										<center><input type="submit"></center>
									</form>
								</td></tr>
							</table>							
						</center>
					</td>
				</tr>
			</table>
	</center>
	</body>	
	
	<?php
	
		$db->CloseDBConnection();
		
	?>
	
</html>