<?php 
	include ("db.php");

	if(isset($_POST['submit'])) { 
		$login = $_POST['login'];
		$password = md5($_POST['password']);

		$result = $mysqli->query("SELECT * FROM `users` WHERE `login`='$login' AND `password`='$password' LIMIT 1");
		echo mysqli_error($mysqli);
		if(mysqli_num_rows($result) == 1){ 
	        $row = mysqli_fetch_array($result); 
	        session_start(); 
	        $_SESSION['login'] = $row['login'];
	        $_SESSION['id'] = $row['id'];
	        header("Location: /index.php"); 
	        exit; 
	    }else{
	        header("Location: /error.php?error=signin"); 
	        exit; 
	    } 
	} else {
    	header("Location: /error.php?error=submit");     
    	exit; 
	} 
	
?>