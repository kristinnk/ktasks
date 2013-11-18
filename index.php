<html>
	<head>
	<link rel="shortcut icon" href="img/icon.ico">
	<title>kTasks</title>
	<LINK REL=StyleSheet HREF="css/style.css">
	<script type="text/javascript">
				
			function toggleDisplay(e){
			    element = document.getElementById(e).style;
			    element.display == 'none' ? element.display = 'block' : 
			    element.display='none';
			    swapImage			    
				}
				
	</script>
</head>
	<body>
		<?php include_once("analyticstracking.php") ?>
		<center>
<center><a href="index.php"><img src="img/logo.svg"height=100p></a><br></center>
<table style="border: 0px; box-shadow: none;">
	<tr>
		<td class="title_bar" colspan=2 style="border:2px solid black">
			<?php
			// Including the mysql functionality.
			include "functions/mysql.php";
			
			if ( isset($_COOKIE['kTasks_user']) )
			{
				$db = new MySQL_Class;	
				$db->ConnectToDB();
				
				$logged_id = $_COOKIE['kTasks_user'];
				$check_query = "select * from users where id=" . $logged_id;
				$results = mysql_query( $check_query );
				$row = mysql_fetch_assoc( $results );
				
				$db->CloseDBConnection();
				
				print "<b>You are logged in as " . $row['name'] . "</b> | <a href='logout.php'>Log out</a>";
			}
			else
			{
				print "You are not logged in. <a href='login.php'>Log in</a> now? Or <a href='register.php'>register</a>!";
			}
			?>
		</td>
	</tr>
	<tr>
		<td valign=top>
			<?php	
				//include "side_view.php";
			?>
			<table width=400 cellspacing=0>
				<tr>
					<td class="title_bar">
						<b>Information</b>
					</td>
				<tr>
				</tr>
					<td class='table_bg' align=center><br>						
						<div style="width:320px; display: inline-block;" align=justify><p>
							<img src="img/paper_ico.svg" width=120px align=right ><br>
							<b>About:</b><br>
							So you have stumbled upon this website and are wondering what the heck it is all about?
							In short, kTasks is a tool to help you track your progress as you work on a project. If it can
							be broken down into smaller tasks, then kTasks is for you!
						</div>						
						<div style="width:320px; display: inline-block;" align=justify><br>
							<b>So how does it work?</b><br>
							kTasks is loosely based on the agile (scrum and kamban board) system of project management in that it attempts to
							implement the group based methods to a single developer.
							This tool handles the project, issues and tasks as if you are reading a book. This means that the project
							is your "epic", your issues become your "stories". And your stories are broken down into
							tasks. <br><br>
							<b>Epics?</b><br>
							The "epic" represents the whole of your project. When an epic is finished it should coincide with you
							finishing your epic project. For example, if you intend to create a website the whole site would
							form your epic. In the same way, if you intend to build a bike the finished bike forms your
							epic.<br><br>
							<b>Stories?</b><br>
							Any good epic is made up of a multitude of stories. As you battle to finish each story you are
							going through your own epic storyline. In practical terms this means that when you settle on
							a story you would break it down into manageable, but still pretty general, pieces. For example with the above
							example of creating a website, creating the frontend (the graphical part of the website) would form a story as a part
							of the "create a website" epic. In the same way creating the database for the website would be still another story.<br><br>
							
							<b>Tasks?</b><br>
							Tasks are the most low level part of your epic. They form the actual tasks needed to finish each storyline.
							If we continue the website example, when you might be working on creating the front end you might want to create
							a graphical representation of a login screen, or create the front page. Both parts are vital to finish the story, which
							in turn allows you to finish your epic.<br><br>
							
							An example of how this works can be seen in the following figure: <br>
							<br>
							<img src="img/explanation.png" style="border:1px solid black">
							<br>
							<br>
							So what are you waiting for!? Start your own personal epic today!	<br><br>
							
							<b>About author : </b> My name is Kristinn E. Kristmundsson and I am an icelandic mechatronics engineer who ran
							out of postit notes one day (and thus this site was born).
							To contact me send a <a href="mailto:kristinnes@gmail.com">mail</a>. All feedback is appreciated :)
							
						</p>			
						</div><br><br>
						</center>
					</td>
				</tr>
			</table>
		</td valign=top>	
		<td valign=top>
		<?php					
		if ( isset($logged_id) )
		{
			include "functions/functions.php";					
		}
		else
		{
					echo "
		<table cellspacing=0 width=450px>
			<tr>
				<td class='title_bar'>
					<b>kTasks news</b>
				</td>
			</tr>
			<tr>
				<td class='table_bg'><br>
				<center>				
					<div style='width:380px; display: inline-block;' align=justify>
						<i>12 November 2012<br><br></i>
						All the features are in! Kamban board, registreation and rudimentary login management. Now for testing and actual use!<br><br>Fun fact: kTasks
						was actually used as features were implemented to help develop kTasks. Devception!<br><br>
						<b>Kristinn K</b>
					</div><br><br>
				<hr>
					<div style='width:380px; display: inline-block;' align=justify>
						<i>11 November 2012<br><br></i>
						kTasks, dev version 0.0.1 is created. This first version includes all the functionality needed
						to keep track of a project. More features are on their way. :)<br><br>
						<b>Kristinn K</b>
					</div><br><br>
				</center>
				</td>
			</tr>
		</table>
		";
		}
		?>		
		</td>
	</tr>
</table>
	
	</center>
	</body>	
	
</html>