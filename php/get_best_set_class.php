<?php
	include "dbconfig.php";

	session_start();
	$id = $_SESSION["id"];
	$sql = "SELECT date FROM bestellt where user_id = $id";
	$result = $conn->query($sql);
	$i = 1;

if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		
		$arr[] = $row["date"];
		
    }
} else {
    echo "0 results";
}

	$return = json_encode($arr);
	echo $return;
	$conn->close();
?>