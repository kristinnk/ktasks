<html>
	
	<title>Venato</title>
	<LINK REL=StyleSheet HREF="css/style.css">

	<?php
	include "functions/mysql.php";

	$db = new MySQL_Class;	
	$db->ConnectToDB();	
	
	?>		

	<body>
		<center>
			
			<table cellspacing=0 width=400>
				<tr>
					<td class='title_bar'>
				<b>Add task to story # <?php print $_GET['id']; ?></b>
					</td>
				</tr>
				<tr>
					<td class='table_bg_round_bottom'>						
						<center>
							<table style="border : 0px;" width=90%> 
								<tr><td align=left>
									<form action="perform_add_task.php" method="post">
										<center><br><img src="img/task_icon.png" width=20%><br></center>
										<?php
										print "<input type=\"hidden\" name=\"task_id\" value=\"" . $_GET['id'] . "\">"
										?>
										<input type="hidden" name="parent_id" value="<?php echo $_GET['id']; ?>">										
										<b>Title : </b> <input type="text" name="task_title">
										<br><b>Description : </b> <br>
										<textarea cols=40 rows="10" name="task_content"></textarea>
										
										<input type="hidden" name="task_assigned_user" value="<?php echo $_COOKIE['kTasks_user']; ?>">									
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