<?php 
	include ("db.php");

	$id = $_GET['id'];
	$name = $_POST['name'];
	$price = $_POST['price'];
	$description = $_POST['description'];
	$experience = $_POST['experience'];
	
	$result = $mysqli->query("INSERT INTO `projects`(`name`, `price`, `description`, `experience`, `date`, `userid`) VALUES('$name', '$price', '$description', '$experience', CURRENT_TIMESTAMP(), '$id')");

	if($result){
		header("Location: /index.php");
		exit();
	} else {
		header("Location: /error.php?error=project");
		exit();
	}
?>