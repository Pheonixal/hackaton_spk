<?php 
	include ("db.php");

	$track = $_POST['track'];

	$result = $mysqli->query("SELECT `id` FROM `projects` WHERE `tracknumber` = '$track'");

	$row = mysqli_fetch_array($result);
	$id = $row['id'];
	
	if(isset($id)){
		header('Location: /track.php?id='.$id);
		exit;
	} else {
		header('Location: /error.php?error=track');
		exit;
	}
	
?>