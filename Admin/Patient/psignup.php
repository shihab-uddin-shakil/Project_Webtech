<!DOCTYPE html>
<html>

<head>
    <title>signup</title>
</head>

<body>

    <?php 

		$firstName = $lastName = $email= $address= $contact = $gender=$password=$userName=$msg="";
		$firstNameErr = $lastNameErr = $emailErr = $accountErr=$genderErr=$passwordErr=$userNameErr=$addressErr = $contactErr ="";

		if($_SERVER['REQUEST_METHOD'] == "POST") {

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
            if(empty($_POST['address'])) {
				$addressErr = "Please fill up the Address";
			}
			else {
				$address = $_POST['address'];
			}

			if(empty($_POST['contact'])) {
                $contactErr = "Please fill up the  contact";
			}
			else {

                $contact = $_POST['contact'];
			//	$lastName = htmlspecialchars($_POST['lname']);
			}

			if(empty($_POST['email'])) {
				$emailErr = "Please fill up the website";
			}
			
			else {
				$email = $_POST['email'];
            
            
			}

            if(!isset($_POST['gender'])) {
               
				$genderErr = "Please cheked  the Gender";
			}
			else {
				$gender = $_POST['gender'];
			}
            if(empty($_POST['userName'])) {
				$userNameErr = "Please fill up the firstname";
			}
			else {
				$userName= $_POST['userName'];
			}
       
        if(empty($_POST['password'])) {
            $passwordErr = "Please fill up the firstname";
        }
        else {
            $password= $_POST['password'];
        }
            



			if($firstNameErr == "" && $lastNameErr == ""&& $addressErr =="" && $contactErr =="" && $emailErr == "" && $passwordErr == "" && $accountErr == ""&& $userNameErr == "") {
                $host = "localhost";
	            $user = "wta_user_1";
	             $pass = "123";
	            $db = "wta";
                // Mysqli object-oriented
                $con = new mysqli($host, $user, $pass,$db);
            
                if($con -> connect_error) {
                    echo "Database Connection Failed!";
                    echo "<br>";
                    echo $con -> connect_error;
                }
                else{


                    $stmt = $con->prepare("insert into PatientSignup (fname, lname,gender,email,contact,address,username,password,status) VALUES (?, ?, ?, ? ,?,?,?,?,?)");
                   
                   $stmt -> bind_param("sssssssss", $fname,$lname,$genderD,$emailD,$cont,$add,$username,$passwordD,$stus);
                    
                   $fname= $firstName;
                   $lname= $lastName;
                   $genderD=$gender;
                   $emailD=$email;
                   $cont=$contact;
                   $add=$address;
                   $username=$userName;
                   $passwordD=$password;
                   $stus="inactive";
                    //Executing the statement
                    $stmt->execute();
                    //Closing the statement
                    $stmt->close();
                    //Closing the connection
                    $con->close();
                    $msg="successfully registration";
                }
			}

            else{
                echo "<br>";
                $msg=   "Invalid  registered. Please try again!!" ;
            }
		}
    
	?>
    <div>
        <a href="http://localhost/index.php">
            <h1>Doctors*House</h1>
        </a>


    </div>
    <h1>Patient Sign-up Form</h1>

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

        <label for="gender">Gender</label>
        <input type="radio" name="gender" id="male" value="male">
        <label for="male">Male</label>
        <input type="radio" name="gender" id="female" value="female">
        <label for="female">Female</label>
        <p><?php echo $genderErr; ?></p>
        <br>
        <br>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="<?php echo $email ?>">
        <p><?php echo $emailErr; ?></p>

        <br>


        <label for="userName">User Name</label>
        <input type="text" id="userName" name="userName" value="<?php echo $userName ?>">
        <p><?php echo $userNameErr; ?></p>

        <br>
        <br>
        <label for="address">Address</label>
        <input type="text" id="" name="address" value="<?php echo $address ;?>">
        <p><?php echo $addressErr; ?></p>

        <br>

        <label for="contact">Contact Number:</label>
        <input type="phone" id="" name="contact" value="<?php echo $contact; ?>">
        <p><?php echo $contactErr; ?></p>

        <br>

        <label for="password">Password</label>
        <input type="password" id="password" name="password" value="<?php echo $password ?>">
        <p><?php echo $passwordErr; ?></p>

        <br>
        <p><?php echo $accountErr; ?></p>

        <br>

        <br>
        <p><?php echo $msg; ?></p>


        <input type="submit" value="Signup">

    </form>

</body>

</html>