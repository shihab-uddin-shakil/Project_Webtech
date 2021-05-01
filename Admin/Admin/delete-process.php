<?php
 $host = "localhost";
 $user = "wta_user_1";
 $pass = "123";
 $db = "wta";

 // Mysqli object-oriented
 $conn = new mysqli($host, $user, $pass, $db);
         
   if($conn->connect_error) {
   $Erre= "Database Connection Failed!";
   echo "<br>";
   echo $conn1->connect_error;
     }
     else{
$sql = "DELETE FROM DoctorSignup WHERE did='" . $_GET["did"] . "'";
if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
}
mysqli_close($conn);
?>