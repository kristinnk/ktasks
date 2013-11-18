<html>
	
	<title>kTasks, Omg, the TASKS!</title>
	<LINK REL=StyleSheet HREF="css/style.css">

	<body>
		<center>
			
			<table cellspacing=0 width=400>
				<tr>
					<td class='title_bar'>
					<b>Are you sure?</b>
					</td>
				</tr>
				<tr>
					<td class='table_bg_round_bottom'>
						<br><br>
						<center>
							<?php
						
							$rem_ID = $_GET['epic_id'];
								print "<a href='perform_remove_epic.php?id=" . $rem_ID . "'>Yes, remove this epic.</a>";
						
							?>		
							<br>
							<br>
							<a href=javascript:history.back()>No, take me back.</a>
						</center>
					<br><br>
					</td>
				</tr>
			</table>
	</center>
	</body>	
	
</html>