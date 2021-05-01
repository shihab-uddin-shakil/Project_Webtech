<?php
// if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['Go'])){

    echo"here.".$_GET['status'];
    $host = "localhost";
    $user = "wta_user_1";
    $pass = "123";
    $db = "wta";
    echo $_POST['userNamee'];

    // Mysqli object-oriented
    $conn1 = new mysqli($host, $user, $pass, $db);
            
                if($conn1->connect_error) {
                    $Erre= "Database Connection Failed!";
                    echo "<br>";
                    echo $conn1->connect_error;
                }
                else {
            
                    $sql = "select did, fname, lname,email,username,category,status from DoctorSignup where username = '".$username."'";
                    $res1 = $conn1->query($sql);
                     $data = array();
                    if($res1->num_rows > 0) {
                        while($row = $res1->fetch_assoc()) {
                            if($_POST['userNamee']==$row['username']){
                                $_POST['status']= $row['status'];
                                $_POST['id']= $row['did'];
                                $_POST['name']=$row['fname']." ".$row['lname'];
                                $_POST['category']=$row['category'];
                                $_POST['email']=$row['email'];
                               
                            }
                           
                           
                           
                        }
                    }
                }
//}   
$conn1->close();
?>