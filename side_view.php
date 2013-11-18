
<table width=400 cellspacing=0>
	<tr>
		<td bgcolor="#e38f8a" colspan=2>
			<b>Your epics.</b>
		</td>
	<tr>
	</tr>
		<td background="img/lined_paper.jpg" valign=top style="border:1px solid black">
		<?php				
			
				$db = new MySQL_Class;	
				$db->ConnectToDB();	
				
				$query = "select * from epics";
				$results_combo = $db->query( $query );
				while ( $row = mysql_fetch_assoc( $results_combo ))
				{	
					print "<a href='index.php?epic_id=" . $row['id'] . "'>" . $row['title'] . "</a>";
					print "</td><td background='img/lined_paper.jpg' valign=top style='border:1px solid black'>";
					print $row['description'];
				}
				$db->CloseDBConnection();
				
		?>
		</td>
	</tr>
	<tr>
		<td background="img/lined_paper.jpg" align=right colspan=2>
			<a href='add_epic.php'>Add an epic!</a>
		</td>
	</tr>
</table> <br>

