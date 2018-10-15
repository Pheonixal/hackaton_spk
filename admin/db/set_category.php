<?php
	$category = $_POST['category'];

	header("Location: /index.php?category=".$category);
	exit;
?>