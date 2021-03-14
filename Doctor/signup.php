<!DOCTYPE html>
<html>

<head>
    <title>doctor signup</title>
</head>

<body>

    <?php 

		$firstName = $lastName = $email=  $doctorType=$gender=$password=$userName=$msg=$schedule1=$schedule2="";
		$firstNameErr = $lastNameErr = $emailErr = $accountErr=$genderErr=$passwordErr=$userNameErr=$schedule1Err=$schedule2Err="";

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

			if(empty($_POST['email'])) {
				$emailErr = "Please fill up the website";
			}
			/*else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  				$emailErr = "Invalid Email Format";
			}*/
			else {
				$email = $_POST['email'];
            
                $myfile = fopen("email.txt", "w") ;
                 $txt = $email;
                  fwrite($myfile, $txt);
                  $_SESSION["email"]=$email;
                fclose($myfile);
			}

          /*  if(empty($_POST['gender'])) {
                $gender = $_POST['gender'];
				$genderErr = "Please fill up the Gender";
			}
			else {
				$gender = $_POST['gender'];
			}*/
            $gender = $_POST['gender'];
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
      /*  else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
              $remailErr = "Invalid Email Format";
        // }*/
        // else if($_SESSION["email"]==$remail) {
        //     echo $_SESSION["email"];
           
        //   // if($_SESSION["email"]==$remail) {
        //     $remail = $_POST['remail'];
        //     $myfilee= fopen("email.txt", "r") or die("Unable to open file!");
        //     fwrite($myfilee, $remail);
        //     fclose($myfile);  
        //    }
        //    else{
        //     $remailErr = "Invalid Email";
        //    }
           
      //  }

            



			if($firstNameErr == "" && $schedule1Err=="" && $schedule2Err=="" && $lastNameErr == "" && $emailErr == "" && $passwordErr == "" && $accountErr == ""&& $userNameErr == "") {
                $arr1 = array('userId' => $userName, 'password' => $password, 'fname' => $firstName,'lname' =>  $lastName ,'email' => $email,'gender'=> $gender,'accountType'=> "doctor",'doctorType'=> $doctorType,'schedule'=> $schedule1." to ".$schedule2 );
                $json_encoded_text =  json_encode($arr1); 

		          $file1 = fopen("doctor.txt", "a+");
		         fwrite($file1, $json_encoded_text);

		          fclose($file1);
                  echo "<br>";
                  $msg=  $firstName . " " . $lastName . " Successful  registered" ;
                 // if (!logged_id()) {
                    // header("Location:Login.php");
                    // exit; // <- don't forget this!
               // }
                
               // delete_everything();
                // header("Login.php"); 
                // echo "<br>";
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
    <h1> Doctor Sign-up Form</h1>

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

        <label for="password">Password</label>
        <input type="password" id="password" name="password" value="<?php echo $password ?>">
        <p><?php echo $passwordErr; ?></p>

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

        <label for="schedule1">Make Schedule:</label>

        <input type="time" id="appt" name="schedule1">
        <label for="schedule2"> to </label>
        <p><?php echo $schedule1Err; ?></p>

        <input type="time" id="appt" name="schedule2">
        <p><?php echo $schedule2Err; ?></p>

        <br>

        <br>
        <p><?php echo $msg; ?></p>


        <input type="submit" value="Submit">

    </form>

</body>

</html>