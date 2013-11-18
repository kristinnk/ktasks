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
								<tr><td align=left><br><center>
									Thank you for registering.<br><br>
									<a href='index.php'>Click here to return to the front page.</a><br>
								</center></td></tr>
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