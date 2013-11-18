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
				<b>Add a story to epic # <?php print $_GET['epic_id']; ?></b>
					</td>
				</tr>
				<tr>
					<td class='table_bg_round_bottom'>						
						<center>
							<table style="border : 0px;" width=90%> 
								<tr><td align=left>									
									<form action="perform_add_story.php" method="post">
										<center><br><img src="img/story_icon.png" width=15%><br></center>
										<?php
										print "<input type=\"hidden\" name=\"task_id\" value=\"" . $_GET['epic_id'] . "\">"
										?>
										<input type="hidden" name="parent_id" value="<?php echo $_GET['epic_id']; ?>">										
										<b>Title : </b> <input type="text" name="story_title">
										<br><b>Description : </b> <br>
										<textarea cols=40 rows="10" name="story_content"></textarea>
										
										<input type="hidden" name="story_assigned_user" value="<?php echo $_COOKIE['kTasks_user']; ?>">									
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