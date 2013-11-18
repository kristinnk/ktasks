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
									<form action="perform_registration.php" method="post">
										<br>
									<b>Username:</b> <input type=text name='username'>
									<b>Password:</b> <input type=text name='password_1'>
									<b>Confirm password:</b> <input type=text name='password_2'>
										<br><br>
										<b>Prove you are human!</b><br>
										<?php
											$num_1 = rand(1, 100);
											$num_2 = rand(1, 100);											
											print "<input type='hidden' value='" . ( $num_1 + $num_2 ) ."' name='correct_sum'>";
											print "What is the sum of " . $num_1 . " and " . $num_2 . "?";
											print "<input type=text name='human_sum'>";
										?>
										
										<br><br>
										<center><input type="submit" value="Start your epic."></center>
										<?php
											if ( isset($_GET['fail']) )
											{
												if ( $_GET['fail'] == 1 )
												{
													print "<font color=red>Enter username.</font>";												
												}
												if ( $_GET['fail'] == 2 )
												{
													print "<font color=red>The passwords do not match.</font>";												
												}
												if ( $_GET['fail'] == 3 )
												{
													print "<font color=red>You are not human.</font>";												
												}
												if ( $_GET['fail'] == 4 )
												{
													print "<font color=red>That username already exists. Please choose another.</font>";												
												}
											}
										?>
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