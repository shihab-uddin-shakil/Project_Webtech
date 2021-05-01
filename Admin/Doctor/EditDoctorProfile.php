<!DOCTYPE html>
<html>

<head>
    <title>Edit Profile</title>
</head>

<body>

    <?php 
    session_start();
$firstName = $lastName = $email=  $doctorType=$msg=$schedule1=$schedule2="";
$firstNameErr = $lastNameErr = $emailErr = $accountErr=$schedule1Err=$schedule2Err="";

$host = "localhost";
$user = "wta_user_1";
$pass = "123";
$db = "wta";

// Mysqli object-oriented
$conn1 = new mysqli($host, $user, $pass, $db);
        
            if($conn1->connect_error) {
                $Erre= "Database Connection Failed!";
                echo "<br>";
                echo $conn1->connect_error;
            }
            else {
        
                $sql = "select did, fname, lname,email,username,category,status,schedule,gender from DoctorSignup";
                $res1 = $conn1->query($sql);
                if($res1->num_rows > 0) {
                    while($row = $res1->fetch_assoc()) {
                        if( $_SESSION["userid"]==$row['username']){
                           // $Estatus= $row['status'];
                            //$Eid= $row['username'];
                            $firstName=$row['fname'];
                            $lastName=$row['lname'];
                           //$type=$row['category'];
                           $email=$row['email'];
                        //    $schedule=$row['schedule'];
                        //    $gender=$row['gender'];
                           
                           
                        }
                       
                       
                       
                    }
                }
            }

             if( isset($_POST['EditProfile'])) {

                if(empty($_POST['fname'])) {
                    $firstNameErr = "Please fill up the firstname";
                }
                else {
                    $firstName = $_POST['fname'];
                }
    
                if(empty($_POST['lname'])) {
                    $lastNameErr = "Please fill up the lastname";
                }
                else {
    
                    $lastName = trim($_POST['lname']);
                    $lastName = htmlspecialchars($_POST['lname']);
                }
    
                if(empty($_POST['email'])) {
                    $emailErr = "Please fill up the website";
                }
                
                
                else {
                    $email = $_POST['email'];
                }
                if(empty($_POST['doctorType'])) {
                    $accountErr = "Please fill up the it";
                }
        
                else {
                    $doctorType= $_POST['doctorType'];
                }
                if(empty($_POST['schedule1'])) {
                    $schedule1Err = "Please fill up the it";
                }
        
                else {
                    $schedule1= $_POST['schedule1'];
                }
                if(empty($_POST['schedule2'])) {
                    $schedule2Err = "Please fill up the it";
                }
        
                else {
                    $schedule2= $_POST['schedule2'];
                }    
                // if(isset($_POST['Update'])&& $_SERVER['REQUEST_METHOD'] == "POST"){
                     $host = "localhost";
                     $user = "wta_user_1";
                     $pass = "123";
                     $db = "wta";
                 
                     // Mysqli object-oriented
                     $conn1 = new mysqli($host, $user, $pass, $db);
                     $con = new mysqli($host, $user, $pass, $db);
                     
                     if($conn1->connect_error &&$con->connect_error ) {
                         echo "Database Connection Failed!";
                         echo "<br>";
                         echo $conn1->connect_error;
                     }
                     else{
                         $stmt1 = $conn1->prepare("update DoctorSignup set fname=?,lname=?,email=?,schedule=?,category=? where username=?");
                         $stmt1->bind_param("ssssss", $firstName, $lastName,$email,$schedule,$category,$_SESSION["userid"]);
                         $category=$doctorType;
                          $schedule=$schedule1.' to '.$schedule2;
                          $stmt = $con->prepare("insert into transaction (doctoruser,patientuser,activity,t_history) VALUES (?, ?, ?, ? )");
                          $stmt -> bind_param("ssss",$d,$p,$a,$ta);
            
                          $d=$_SESSION["userid"];
                          $p="not activate";
                          $a="Edit Profile";
                          $ta=$_SESSION["userid"].":".$firstName." ".$lastName." Edit his profile";
                          $stmt->execute();
                          //Closing the statement
                          $stmt->close();
                          //Closing the connection
                          $con->close();
                         $status = $stmt1->execute();
                      if($status) {
                         $msg= "Data Update Successful.";
                                     }
                         else {
                             $msg= "Failed to Update Data."."<br>";
                          echo $conn1->error;
                             }
                     }
                    
                //}
 
                 }
	?>
    <div>

        <div>
            <a href="http://localhost/Doctor/DoctorDashboard.php">
                <h1>Doctor Dashboard</h1>
            </a>

            <a href="http://localhost/Doctor/logout.php">logout</a>
            <hr>

        </div>

        <div>
            <h1>Edit Profile</h1>

            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
                <label for="firstName">First Name</label>
                <input type="text" id="firstName" name="fname" value="<?php echo $firstName ?>">
                <p><?php echo $firstNameErr; ?></p>

                <br>

                <label for="lastName">Last Name</label>
                <input type="text" id="lastName" name="lname" value="<?php echo $lastName ?>">
                <p><?php echo $lastNameErr; ?></p>

                <br>
                <br>
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="<?php echo $email ?>">
                <p><?php echo $emailErr; ?></p>

                <br>

                <br>

                <label for="doctorType">Doctor Type</label>
                <select name="doctorType">
                    <option value=" Audiologist"> Audiologist</option>
                    <option value="Cardiologist">Cardiologist</option>
                    <option value=" Dentistt"> Dentist</option>
                    <option value="Dermatologist">Dermatologist</option>
                    <option value=" Gynecologist"> Gynecologist</option>
                    <option value="Epidemiologist">Epidemiologist</option>
                    <option value=" Internal Medicine Specialist"> Internal Medicine Specialist</option>
                    <option value="Medical Geneticist">Medical Geneticist</option>

                </select>

                <br>

                <label for="schedule1">Update Schedule:</label>

                <input type="time" id="appt" name="schedule1">
                <label for="schedule2"> to </label>
                <p><?php echo $schedule1Err; ?></p>

                <input type="time" id="appt" name="schedule2">
                <p><?php echo $schedule2Err; ?></p>

                <br>

                <br>
                <p><?php echo $msg; ?></p>


                <input type="submit" name="EditProfile" value="EditProfile">
            </form>

</body>

</html>