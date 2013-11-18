<html>
	
	<title>kTasks, Omg, the TASKS!</title>
	<LINK REL=StyleSheet HREF="css/style.css">

	<body>
		<center>
			
			<table cellspacing=0 width=400>
				<tr>
					<td class='title_bar'>
					<b>Login as an existing user</b>
					</td>
				</tr>
				<tr>
					<td class='table_bg_round_bottom'>
						<center>
						<div style='width:350px; display: inline-block;' align=left>
							<br>
							<form action="verify_login.php" method="post">
								<b>Username :</b><input type="text" name="username"><br>
								<b>Password :</b><input type="password" name="password">
								<input type="submit" value="Log in">
							</form>
							<?php
							if ( isset($_GET['failed'] ) )
							{
								if ( $_GET['failed'] == 1 )
								{
									print "<center><font color=red>Invalid username or password.</font></center>";
								}
							}
							?>						
						<br>
					</div>
					</center>
					</td>
				</tr>
			</table>
	</center>
	</body>	
	
</html>