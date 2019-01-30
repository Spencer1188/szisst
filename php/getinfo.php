<?php
	include "dbconfig.php";
	$id = $_GET["nr"];
	$sql = "SELECT speise1,speise2,speise3,speise4,speise5,speise6 FROM menue where id = $id";
	$result = $conn->query($sql);
	$i = 1;

if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		
		$arr[] = $row["speise1"];
		$arr[] = $row["speise2"];
		$arr[] = $row["speise3"];
		$arr[] = $row["speise4"];
		$arr[] = $row["speise5"];
		$arr[] = $row["speise6"];
		
    }
} else {
    echo "0 results";
}

	$return = json_encode($arr);
	print($return);
	$conn->close();
?>