<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {

	$username = $_POST["username"];
	$status = $_POST["status"];
	echo $status;

	if(empty($username) || empty($status)) {
		echo "Fill up the form properly";
	}
	else {

		$conn = new mysqli("localhost", "wta_user_1", "123", "wta");

		if($conn -> connect_error) {
			echo "Failed to connect database!";
		}
		else {

			$stmt = $conn -> prepare("UPDATE DoctorSignup set status=? where username=?");
			$stmt -> bind_param("ss", $username, $status);

			$statuss = $stmt -> execute();

			if($statuss) {
				echo "Successfully Updated..!";
			}
			else {
				echo "Failed to Updated data!";
			}
			$conn -> close();
		}	
	}

}
if($_SERVER["REQUEST_METHOD"] == "GET") {
//echo"userAction";
// $username = $_GET['username'];
$sql = "SELECT did,fname,lname,email, username,category,status from DoctorSignup";


$conn = new mysqli("localhost", "wta_user_1", "123", "wta");

if($conn -> connect_error) {
    echo "Failed to connect database!";
}
else {
    $result = $conn -> query($sql);

    if($result -> num_rows > 0) {

        
        $arr = array();
        while($row = $result -> fetch_assoc()) {
            array_push($arr, array('did' => $row["did"], 'fname' => $row['fname'],'lname' => $row['lname'],'email' => $row['email'],'username' => $row['username'],'category' => $row['category'],'status' => $row['status']));
        }

        echo json_encode($arr);
    } 
    else {
        echo "No record found!";
    }
}
    
$conn -> close();
}

?>