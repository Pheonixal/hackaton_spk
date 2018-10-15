<?php
	$status = $_GET['status'];
	$id = $_GET['id'];

	include "db/db.php";

	$result3 = $mysqli->query("SELECT `status`,`tracknumber` FROM `projects` WHERE `id` = '$id'");
	$row3 = mysqli_fetch_array($result3);
	$status_old = $row3['status'];
	$tracknumber = $row3['tracknumber'];

	$result = $mysqli->query("UPDATE `projects` SET `status` = '$status' WHERE `id` = '$id'");

	$result2 = $mysqli->query("SELECT `email`, `id` FROM `users` WHERE `id` = (SELECT `userid` FROM `projects` WHERE `id` = '$id')");
	$row2 = mysqli_fetch_array($result2);

	$userid = $row2['id'];

	if($status == $status_old){
		header("Location: index.php");
		exit;
	}

	// Отправка Email
	// $to = $row2['email'];
	$subject = "Смена статуса";
	$txt = "Cтатус вашей заявки ".$tracknumber." изменен с ".$status_old." на ".$status;
	// $headers = "From: adi.official@mail.ru" . "\r\n" .
	// "CC: makhmudgaly2@gmail.com";
	// mail($to,$subject,$txt,$headers);

	// Отправка уведомления
	$result4 = $mysqli->query("INSERT INTO `notifications` (`userid`, `title`, `content`, `status`) VALUES ('$userid', '$subject', '$txt', 0)");

	header("Location: index.php");
	exit;
?>