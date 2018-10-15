<?php

	$mysqli = mysqli_connect('localhost', 'root', '', 'SPK_DB');

	if(mysqli_connect_errno()){
		echo 'Failed to connect to MySQL'. mysqli_connect_errno();
	}

?>