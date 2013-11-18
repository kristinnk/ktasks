
<?php



		$db = new MySQL_Class;	
		$db->ConnectToDB();
		
		//Print out the stories into a html table.	
		
		echo "
		<table cellspacing=0 width=450px>
			<tr>
				<td class='title_bar_top_epics_left'>
					<b>Your epics!</b>
				</td>
				<td class='title_bar_top_epics_right' align=right>
					<a href='add_epic.php'>Add an epic!</a>
				</td>
			</tr>
		</table><br>
		";
		$epic_query = "select * from epics where assigned_user=" . $logged_id;
		$epic_results = $db->query( $epic_query );
		while ( $epic_row = mysql_fetch_assoc( $epic_results ) )
		{
			print "<table width=450px cellspacing=0>";
			print "<tr>";
			print "<td class='title_bar'>";
			print "<b>Epic name : " . $epic_row['title'] . "</b>";
			print "<img src='img/arrow_icon.png' height=60% align=right onclick=\"toggleDisplay('epic_td_" . $epic_row['id'] . "');\"'>";
			print "<img src='img/kamban_ico.jpg' align=right onclick=\"toggleDisplay('kamban_" . $epic_row['id'] . "');\"'>";
			
			print "</td></tr>";
			print "<tr><td class='table_bg_noround' align='center'><br>";
			print "<div style='width:400px; display: inline-block;' align=justify><b>Description :</b> " . $epic_row['description'] . "</div>";
			print "<br><br>";
			print "<tr><td class='table_bg_noround' id='epic_td_" . $epic_row['id'] . "' style='display:none;'><br>";
			
				$query = "SELECT * FROM stories where parent_id=" . $epic_row['id'];
				$results = $db->query( $query );
				while ( $row = mysql_fetch_assoc( $results )) 
				{
						print "<center>";
						print "<table width=95% c cellspacing=0>";
						print "<tr><td class='title_bar_4' colspan=2>";
						print "<b><i>Story #" . $row['id'] . " </i> - <b>" . $row['title'] . "</b>";			
						print "</td></tr>";
						print "<tr><td colspan=2 class='subtable_bg_noround' align='center'><div style='width:400px; display: inline-block;' align=justify><br>" . $row['content'] . "</div><br><br></tr></td>";			
						print "<tr><td colspan=2 class='subtable_bg_noround'>";
						print "<center>";
									
						print "<table bgcolor='#EEEEEE' width=90%px>";
						print "<tr><td>";
						print "<b>Associated tasks</b>";
						print "<img src='img/arrow_icon.png' height=60% align=right onclick=\"toggleDisplay('AssocTable" . $row['id'] . "');\"'>";
						print "</td></tr><tr><td id='AssocTable" . $row['id'] . "' style='display:none;'>";
						$associated_tasks_query = "select * from tasks where parent_id='" . $row['id'] . "' ORDER BY status ASC";
						$associated_tasks_results = $db->query( $associated_tasks_query );			
						while ( $associated_row = mysql_fetch_assoc ( $associated_tasks_results ) )
						{			
							print "<center>";
							if ( $associated_row['status'] == 4 )
							{
								print "<table class='postit_note_closed' width=90%>";
							}
							else
							{
								print "<table class='postit_note' width=90%>";	
							}
							
							print "<tr><td><b>" . $associated_row['title'] . "</b></td></tr>";
							
							print "<tr><td>";
							if ( $associated_row['status'] == 4 )
							{
								print "<strike>" . $associated_row['content'] . "</strik>";
							}
							else
							{
								print $associated_row['content'];
							}
							print "</td></tr>";
							
								$task_assigned_to_query = "Select name from users where id='" . $associated_row['assigned_user'] . "'";
								$task_assigned_to_results = $db->query( $task_assigned_to_query );
								$task_assigned_row = mysql_fetch_assoc( $task_assigned_to_results );
				
							switch ( $associated_row['status'] )
							{
								case 0: $task_status = "Inactive"; break;
								case 1: $task_status = "In progress"; break;
								case 2: $task_status = "Ready for testing"; break;
								case 3: $task_status = "In testing"; break;
								case 4: $task_status = "Done"; break;
							}
							print "</center>";
							print "<tr><td> Status : " . $task_status . "</tr></td>";
							print "<tr><td align=right><a href='edit_task.php?task_id=" . $associated_row['id'] . "'>Edit</a> | <a href='remove_task.php?task_id=" . $associated_row['id'] . "'>Remove</a></td></tr>";
							
							print "</table><br>";			
							print "</center>";
						}
						print "<tr><td align=right><a href='add_task.php?id=" . $row['id'] . "'>Add a task</a></td></tr>";
						print "</td></tr></table><br>";
						
						print "</td></tr>";
						
							$assigned_to_query = "Select name from users where id='" . $row['assigned_user'] . "'";
							$assigned_to_results = $db->query( $assigned_to_query );
							$assigned_row = mysql_fetch_assoc( $assigned_to_results );
			
						switch ( $row['status'] )
						{
							case 0: $status = "Inactive";
								 			break;
							case 1: $status = "In progress"; 
											break;
							case 2: $status = "Ready for testing"; 
											break;
							case 3: $status = "In testing"; 
											break;
							case 4: $status = "Done"; 
											break;
						}
						print "</center>";
						print "<tr><td class='subtable_bg_roundleft'> Status : " . $status . "</td>";
						print "<td align=right class='subtable_bg_roundright'> <a href='remove_story.php?story_id=" . $row['id'] . "'>Remove</a> </tr></td>";
						print "</table>";	
						print "<br>";
				}
		
			print "<tr>";
			print "	<td class='table_bg' align=right>";
			print "		<a href='add_story.php?epic_id=" . $epic_row['id'] . "'>Add a story</a> | <a href='remove_epic.php?epic_id=" . $epic_row['id'] . "'>Remove this epic</a>";			
			print "	</td>";					
			print "</tr>";
			print "</tr>";			
			print "</td>";						
			print "</table>";
						
			echo "<table width=450px  id='kamban_" . $epic_row['id'] . "'  style='display:none;' cellspacing=0>
							<tr>
								<td class='kamban_title'>
									<font color=white>Kamban board for epic \"" . $epic_row['title'] . "\"</font>
								</td>								
							</tr>
							<tr>
								<td class='table_bg'>
									<center><br>
										<table width=95% cellspacing=0;>
										<tr>
											<td class='kamban_subtitle_bar_left' width=20%>
												<b><center>Inactive</center></b>
											</td>
											<td class='kamban_subtitle_bar' width=20%>
												<b><center>In progress</center></b>
											</td>
											<td class='kamban_subtitle_bar' width=20%>
												<b><center>Ready for testing</center></b>
											</td>
											<td class='kamban_subtitle_bar' width=20%>
												<b><center>In testing</center></b>
											</td>
											<td class='kamban_subtitle_bar_right' width=20%>
												<b><center>Done</center></b>
											</td>
										</tr>										
										<tr>
											<td class='kamban_subtable_left' valign=top>
											";
											$kamban_epic_query = "select * from stories where parent_id=" . $epic_row['id'];
											$kamban_epic_results = $db->query( $kamban_epic_query );
											while ( $kamban_epic_row = mysql_fetch_assoc( $kamban_epic_results ) )
											{
												$kamban_query = "select * from tasks where parent_id=" . $kamban_epic_row['id'] . " AND status=0";
												$kamban_results = $db->query( $kamban_query );
												while ( $kamban_row = mysql_fetch_assoc( $kamban_results ) )
												{
													print "<br><center><table cellspacing=0 width=90%>";
													print "	<tr>";
													print "		<td class='kamban_ticket_light'><br>";
													print $kamban_row['title'];
													print "		<br><br></td>";
													print "	</tr>";
													print "</table></center>";
												}
											}
											print "<br>";
				              echo "
											</td>
											<td bgcolor='#FBFBFB' valign=top>
											";
											$kamban_epic_query = "select * from stories where parent_id=" . $epic_row['id'];
											$kamban_epic_results = $db->query( $kamban_epic_query );
											while ( $kamban_epic_row = mysql_fetch_assoc( $kamban_epic_results ) )
											{
												$kamban_query = "select * from tasks where parent_id=" . $kamban_epic_row['id'] . " AND status=1";
												$kamban_results = $db->query( $kamban_query );
												while ( $kamban_row = mysql_fetch_assoc( $kamban_results ) )
												{
													print "<br><center><table cellspacing=0 width=90%>";
													print "	<tr>";
													print "		<td class='kamban_ticket_light'><br>";
													print $kamban_row['title'];
													print "		<br><br></td>";
													print "	</tr>";
													print "</table></center>";
												}
											}
											print "<br>";
				              echo "
											</td>
											<td bgcolor='#EAEAEA' valign=top>
											";
											$kamban_epic_query = "select * from stories where parent_id=" . $epic_row['id'];
											$kamban_epic_results = $db->query( $kamban_epic_query );
											while ( $kamban_epic_row = mysql_fetch_assoc( $kamban_epic_results ) )
											{
												$kamban_query = "select * from tasks where parent_id=" . $kamban_epic_row['id'] . " AND status=2";
												$kamban_results = $db->query( $kamban_query );
												while ( $kamban_row = mysql_fetch_assoc( $kamban_results ) )
												{
													print "<br><center><table cellspacing=0 width=90%>";
													print "	<tr>";
													print "		<td class='kamban_ticket_light'><br>";
													print $kamban_row['title'];
													print "		<br><br></td>";
													print "	</tr>";
													print "</table></center>";
												}
											}
											print "<br>";
				              echo "
											</td>
											<td bgcolor='#FBFBFB' valign=top>
											";
											$kamban_epic_query = "select * from stories where parent_id=" . $epic_row['id'];
											$kamban_epic_results = $db->query( $kamban_epic_query );
											while ( $kamban_epic_row = mysql_fetch_assoc( $kamban_epic_results ) )
											{
												$kamban_query = "select * from tasks where parent_id=" . $kamban_epic_row['id'] . " AND status=3";
												$kamban_results = $db->query( $kamban_query );
												while ( $kamban_row = mysql_fetch_assoc( $kamban_results ) )
												{
													print "<br><center><table cellspacing=0 width=90%>";
													print "	<tr>";
													print "		<td class='kamban_ticket_light'><br>";
													print $kamban_row['title'];
													print "		<br><br></td>";
													print "	</tr>";
													print "</table></center>";
												}
											}
											print "<br>";
				              echo "
											</td>
											<td class='kamban_subtable_right' valign=top>
											";
											$kamban_epic_query = "select * from stories where parent_id=" . $epic_row['id'];
											$kamban_epic_results = $db->query( $kamban_epic_query );
											while ( $kamban_epic_row = mysql_fetch_assoc( $kamban_epic_results ) )
											{
												$kamban_query = "select * from tasks where parent_id=" . $kamban_epic_row['id'] . " AND status=4";
												$kamban_results = $db->query( $kamban_query );
												while ( $kamban_row = mysql_fetch_assoc( $kamban_results ) )
												{
													print "<br><center><table cellspacing=0 width=90%>";
													print "	<tr>";
													print "		<td class='kamban_ticket_dark'><br><strike>";
													print $kamban_row['title'];
													print "		</strike><br><br></td>";
													print "	</tr>";
													print "</table></center>";
												}
											}
											print "<br>";
				              echo "
											</td>
										</tr>
										</table><br>
									</center>
								</td>
							</tr>
						</table><br>";
		}		
		
		$db->CloseDBConnection();


?>

