<?php 


if($_SERVER["REQUEST_METHOD"] == "GET") {

	
		$sql = "SELECT did, fname, lname,email,username,category,schedule,status from DoctorSignup";

	
	$conn = new mysqli("localhost", "wta_user_1", "123", "wta");

	if($conn -> connect_error) {
		echo "Failed to connect database!";
	}
	else {
		$result = $conn -> query($sql);

		if($result -> num_rows > 0) {

			echo' <table id="myTable">
            <tr class="header">
                <th> #Id</th>
                <th> #Name</th>
                <th>Schedule</th>
                <th>Doctor Type</th>
                <th>Email</th>
                <th>Status</th>
                <th>UserName</th>
                <th>Action</th>


            </tr>';

			while($row = $result -> fetch_assoc()) {

				echo "<tr>";
				echo "<td>" . $row["did"] . "</td><td>" . $row["fname"]." ". $row["lname"] . "</td><td>" .$row['schedule']. "</td><td>".$row['category']. "</td><td>" .$row['email']. "</td><td>".$row['status']. "</td><td>" .$row['username']. "</td><td>" ."<a href='delete-process.php?did=<?php echo". $row["did"] ."?>'>Delete</a>"."
<td>";
    echo "</tr>";
    }

    echo "</table>";


    }
    else {
    echo "No record found!";
    }
    }

    $conn -> close();
    }

    ?>