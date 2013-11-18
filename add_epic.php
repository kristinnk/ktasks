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
				<b>Add an epic.</b>
					</td>
				</tr>
				<tr>
					<td class='table_bg_round_bottom'>
						<center>
							<table style="border : 0px;" width=90%> 
								<tr><td align=left>
									<form action="perform_add_epic.php" method="post">
										<center><br><img src="img/epic_icon.png" width=20%><br></center>
										<br>The epic represents your overall project. Enter a title and a general description below. <br><br>
										<b>Title : </b> <input type="text" name="epic_title">
										<br><b>Description : </b> <br>
										<textarea cols=40 rows="10" name="epic_description"></textarea>
										<input type="hidden" name="epic_assigned_user" value="<?php echo $_COOKIE['kTasks_user']; ?>">
										<br>
										<center><input type="submit" value="Start your epic."></center>
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