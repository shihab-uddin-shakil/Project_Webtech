<!DOCTYPE html>
<html>

<head>
    <title>doctor</title>
</head>

<body>

    <?php 
    session_start();
    //if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['Go'])){

        // if(empty($_POST['userNamee'])) {
        //     $userNameErre = "Please fill up the username";
        // }
        // else {
        //     $userNamee = $_POST['userNamee'];
        // }
        // echo  $_SESSION["userid"];
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
                                    $Estatus= $row['status'];
                                    $Eid= $row['username'];
                                    $doctorname=$row['fname']." ".$row['lname'];
                                   $type=$row['category'];
                                   $Email=$row['email'];
                                   $schedule=$row['schedule'];
                                   $gender=$row['gender'];
                                  
                                   
                                   
                                   
                                }
                               
                               
                               
                            }
                        }
                    }
  //  }   
    
	?>
    <header>
        <nav>
            <div>

                <div>
                    <a href="http://localhost/Doctor/DoctorDashboard.php">
                        <h1>Doctors*Dashboard</h1>
                    </a>


                </div>


            </div>
        </nav>

    </header>
    <div>
        <div>
            <h1><?php echo $doctorname; ?></h1>
            <hr>
            <br><br><br>

            <h2>Personal information:</h2>

            <h3><?php echo $Eid; ?></h3>
            <h3><?php echo $type; ?></h3>
            <h3><?php echo $Estatus; ?></h3>
            <h3><?php echo $gender; ?></h3>
            <br><br> <br><br><br>
            <h2>Communication</h2>

            <h3><?php echo $Email; ?></h3>
            <br><br><br>
            <br><br><br>

            <h2>Schedule for visit:</h2>

            <h3><?php echo $schedule; ?></h3>
            <br><br><br>

            <h2>Visit Ammount</h2>

            <h3>500 taka</h3>

        </div>

    </div>
    <footer>
        <div>


            <div>&copy; Spring_20_21_WT_A_G03 2021</div>
        </div>
    </footer>


</body>

</html>