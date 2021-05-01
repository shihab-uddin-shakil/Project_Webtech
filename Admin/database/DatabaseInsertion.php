<!DOCTYPE html>
<html>
<head>
	<title>Database Insertion</title>
</head>
<body>
	<h1>Database Insertion</h1>

	<?php 

	$host = "localhost";
	$user = "wta_user_1";
	$pass = "123";
	$db = "wta";

	// Mysqli object-oriented
	$conn1 = new mysqli($host, $user, $pass, $db);

	if($conn1->connect_error) {
		echo "Database Connection Failed!";
		echo "<br>";
		echo $conn1->connect_error;
	}
	else {
		echo "Database Connection Successful!";
		
		/*$sql = "insert into users (username, password) values ('abc', '123')";
		if($conn1->query($sql)) {
			echo "Data Insertion Successful.";
		}
		else {
			echo "Failed to Insert Data.";
			echo "<br>";
			echo $conn1->error;
		}*/


		$stmt1 = $conn1->prepare("insert into users (username, password) VALUES (?, ?)");
		$stmt1->bind_param("ss", $p1, $p2);
		$p1 = $_POST['username'];
		$p2 = $_POST['password'];
		$status = $stmt1->execute();

		if($status) {
			echo "Data Insertion Successful.";
		}
		else {
			echo "Failed to Insert Data.";
			echo "<br>";
			echo $conn1->error;
		}
	}

	$conn1->close();


	// Mysqli procedural
	/*$conn2 = mysqli_connect($host, $user, $pass);
	if(mysqli_connect_error()) {
		echo "Database Connection Failed!";
		echo "<br>";
		echo $conn2 -> connect_error;
	}
	else {
		echo "Database Connection Successful!";
	}
	mysqli_close($conn2);*/

	?>
</body>
</html>