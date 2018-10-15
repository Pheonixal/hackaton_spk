<?php
	include "db.php";
	$title = $_POST['title'];
	$message = $_POST['message'];
	$id = $_GET['id'];

	$result = $mysqli->query("INSERT INTO `messages` (`userid`, `title`, `content`) VALUES ('$id', '$title', '$message')");

	header("Location: /account.php");
	exit;
?>