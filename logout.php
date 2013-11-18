<?php
	setcookie(kTasks_user, $_GET['id'], $past);
	header('location:index.php');
?>