<?php
	include "dbconfig.php";

	session_start();
	$usrid = $_SESSION["id"];
	$menuid = $_GET["menuid"];
	$date = $_GET["date"];

	$sql = "INSERT INTO `bestellt`(`menue_id`,`date`,`user_id`) VALUES ($menuid,$date,$usrid)";

	if ($conn->query($sql) === TRUE) {
		echo "New record created successfully";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}

	
	

?>