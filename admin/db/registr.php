<?php 
	include ("db.php");

	$login = $_POST['login'];
	$mobile_number = $_POST['number'];
	$yurlitso = $_POST['yurlitso'];
	$name = $_POST['name'];
	$surname = $_POST['surname'];
	$middlename = $_POST['middlename'];
	$fullname = $name.' '.$surname.' '.$middlename;
	$email = $_POST['email'];
	$password = md5($_POST['password']);

	$result = $mysqli->query("INSERT INTO `users`(`login`, `mobile_number`, `yurlitso`, `fullname`, `email`, `password`) VALUES('$login', '$mobile_number', '$yurlitso', '$fullname', '$email', '$password')");

	if($result){
		header("Location: /index.php");
		exit();
	} else {
		header("Location: /error.php?error=user")
		exit();
	}

	echo mysqli_error($mysqli);
?>