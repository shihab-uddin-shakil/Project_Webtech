<?php 

    $userNamee="";
    $userNameErre="";
    $Erre="";
    if(isset($_POST['search'])){
       

        if($_SERVER['REQUEST_METHOD'] == "POST"){

            if(empty($_POST['userNamee'])) {
                $userNameErre = "Please fill up the username";
            }
            else {
                $userNamee = $_POST['userNamee'];
            }
        
            if($userNameErre == ""){
                //admin user
                $file2 = fopen("C:/xampp/htdocs/Doctor/doctor.txt", "r");
                $read = fread($file2, filesize("C:/xampp/htdocs/Doctor/doctor.txt"));
                fclose($file2);
                $json_decoded_text = json_decode($read, true);
               
                if($userNamee==$json_decoded_text['userId']){
                    header("location:http://localhost/Patient/doctorProfile.php");
                    die();
                }
                else{
                 $Erre="Unable search ..User ID Invalid please Try again..!!";
                }        
                
            }
            
        
           else{
            $Erre="Unable search";
           }
      }

    }
    
	?>

<html>

<head>
    <title>Doctor Login</title>
</head>

<body>



<div>
                    <a href="http://localhost/Patient/PatientDashboard.php">
                        <h1>Patient Dashboard</h1>
                    </a>
                    <a href="http://localhost/Patient/logout.php">logout</a>
                    <hr>

                </div>

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">


        <label>Search Doctor Profile</label>
        <br>
        <label for="userNamee">Enter Doctor Id:</label>
        <br>
        <input type="text" id="userNamee" name="userNamee" value="<?php echo $userNamee ?>">
        <p><?php echo $userNameErre; ?></p>

        <br>


        <p><?php echo $Erre; ?></p>


        <input type="submit" name="search" value="SearchDoctor">


    </form>


</body>

</html>