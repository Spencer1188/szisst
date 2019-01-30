<?php
	include "dbconfig.php";
	$datum = $_GET["datum"];
	$sql = "SELECT * FROM menue where datum = $datum";
	$result = $conn->query($sql);
	$i = 0;
if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		$arr[$i] = $row["name"] . "-" .$row["art"];
		$i++;
    }
} else {
    echo "0 results";
}

	$return = json_encode($arr);
	print($return);
	$conn->close();
?>