<!DOCTYPE html>
<html>

<head>
    <title>doctor signup</title>
</head>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
    background-color: navajowhite;
}

h3 {
    text-align: center;

}


.form {
    background: #f1f1f1;
    width: 570px;
    margin: 0 auto;
    padding-left: 50px;
    padding-top: 20px;
}

.form fieldset {
    border: 0px;
    padding: 0px;
    margin: 0px;
}

.form p.contact {
    font-size: 12px;
    margin: 0px 0px 10px 0;
    line-height: 14px;
    font-family: Arial, Helvetica;
}

.form input[type="text"] {
    width: 400px;
}

.form input[type="email"] {
    width: 400px;
}

.form input[type="password"] {
    width: 400px;
}

.form input[type="time"] {
    width: 120px;
}



.form label {
    color: #000;
    font-weight: bold;
    font-size: 12px;
    font-family: Arial, Helvetica;
}

.form .select-style {
    -webkit-appearance: button;

    -webkit-padding-end: 20px;
    -webkit-padding-start: 2px;
    -webkit-user-select: none;
    background-position: center right;
    background-repeat: no-repeat;
    border: 0px solid #FFF;
    color: #555;
    font-size: inherit;
    margin: 0;
    overflow: hidden;
    padding-top: 5px;
    padding-bottom: 5px;
    text-overflow: ellipsis;
    white-space: nowrap;
}

.button {
    background: #4b8df9;
    display: inline-block;
    padding: 5px 10px 6px;
    color: #fbf7f7;
    text-decoration: none;
    font-weight: bold;
    line-height: 1;
    -moz-border-radius: 5px;
    -webkit-border-radius: 5px;
    border-radius: 5px;
    -moz-box-shadow: 0 1px 3px #999;
    -webkit-box-shadow: 0 1px 3px #999;
    box-shadow: 0 1px 3px #999;
    text-shadow: 0 -1px 1px #222;
    border: none;
    position: relative;
    cursor: pointer;
    font-size: 14px;
    font-family: Verdana, Geneva, sans-serif;
}

.button:hover {
    background-color: #2a78f6;
}
</style>

<body>

    <?php 
session_start();
// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;

// // Load Composer's autoloader
// require 'vendor/autoload.php';

// // Instantiation and passing `true` enables exceptions
// $mail = new PHPMailer(true);

//     // if(empty($_POST['fname'])||empty($_POST['lname'])||empty($_POST['email'])||!isset($_POST['gender'])||empty($_POST['userName'])||empty($_POST['password'])||empty($_POST['category'])||empty($_POST['schedule2'])||empty($_POST['schedule1'])) {
//     //     $msg = "Please fill up the Registration form properly..";
//     // }
//     // else {
//         if(isset($_POST['Submit'])){
//         try {
//             //Server settings
//             $mail->SMTPDebug = 0;                                       // [server]$ pear install --alldeps Mail0 - Disable Debugging, 2 - Responses received from the server
//             $mail->isSMTP();                                            //shihab.uddin121111@gmail.com Set mailer to use SMTP
//             $mail->Host       = 'tls://smtp.gmail.com:587';  // Specify main and backup SMTP servers
//             $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
//             $mail->Username   = 'shihab.uddin121111@gmail.com';                     // SMTP username
//             $mail->Password   = 'Shihabuddin121111#';                               // SMTP password
//             //$mail->SMTPSecure = 'tls';//PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption, `PHPMailer::ENCRYPTION_SMTPS` also accepted
//             //$mail->Port       = 587;                                    // TCP port to connect to
//             $_SESSION['mail']=$_POST['email'];
//             $m=$_POST['email'];
//             //Recipients
//             $mail->setFrom('shihab.uddin121111@gmail.com', 'Shihab Uddin shakil');
//             $mail->addAddress($m,"shakil");     // Add a recipient
          
//             // Attachement 
//            // $mail->addAttachment('upload/file.pdf');
//            // $mail->addAttachment('upload/image.png', 'image 1');    // Optional name
        
//             // Content
//             $token =rand(10,9999);
//             $mail->isHTML(true); // Set email format to HTML
//             $mail->Subject = 'Doctors*House Confirmation::';
//             $mail->Body = '<b>Your verification code is '.$token."</b>";
//            // $mail->AltBody = 'A test email fromshihabuddinshakil9@gmail.com'; // Plain text for non-HTML mail clients
        
//             $mail->send();
//             echo 'Message has been sent Please verified Email';
//         } catch (Exception $e) {
//             echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
//         }
//     }
   // }

		$firstName = $lastName = $email=  $doctorType=$gender=$password=$userName=$msg=$schedule1=$schedule2="";
		$firstNameErr = $lastNameErr = $emailErr = $accountErr=$genderErr=$passwordErr=$userNameErr=$schedule1Err=$schedule2Err="";

	// 	if($_SERVER['REQUEST_METHOD'] == "POST") {

	// 		if(empty($_POST['fname'])) {
	// 			$firstNameErr = "Please fill up the firstname";
	// 		}
	// 		else {
	// 			$firstName = $_POST['fname'];
	// 		}

	// 		if(empty($_POST['lname'])) {
	// 			$lastNameErr = "Please fill up the lastname";
	// 		}
	// 		else {

	// 			$lastName = trim($_POST['lname']);
	// 			$lastName = htmlspecialchars($_POST['lname']);
	// 		}

	// 		if(empty($_POST['email'])) {
	// 			$emailErr = "Please fill up the website";
	// 		}
            
			
	// 		else {
	// 			$email = $_POST['email'];
            
        
	// 		}
    //         if(!isset($_POST['gender'])) {
               
	// 			$genderErr = "Please cheked  the Gender";
	// 		}
	// 		else {
	// 			$gender = $_POST['gender'];
	// 		}


            
    //         if(empty($_POST['userName'])) {
	// 			$userNameErr = "Please fill up the firstname";
	// 		}
	// 		else {
	// 			$userName= $_POST['userName'];
	// 		}
       
    //     if(empty($_POST['password'])) {
    //         $passwordErr = "Please fill up the firstname";
    //     }
    //     else {
    //         $password= $_POST['password'];
    //     }

    //     if(empty($_POST['doctorType'])) {
    //         $accountErr = "Please fill up the it";
    //     }

    //     else {
    //         $doctorType= $_POST['doctorType'];
    //     }
    //     if(empty($_POST['schedule1'])) {
    //         $schedule1Err = "Please fill up the it";
    //     }

    //     else {
    //         $schedule1= $_POST['schedule1'];
    //     }
    //     if(empty($_POST['schedule2'])) {
    //         $schedule2Err = "Please fill up the it";
    //     }

    //     else {
    //         $schedule2= $_POST['schedule2'];
    //     }

            



	// 		if($firstNameErr == "" && $schedule1Err=="" && $schedule2Err=="" && $lastNameErr == "" && $emailErr == "" && $passwordErr == "" && $accountErr == ""&& $userNameErr == "") {
    //             $host = "localhost";
	//             $user = "wta_user_1";
	//              $pass = "123";
	//             $db = "wta";
    //             // Mysqli object-oriented
    //             $con = new mysqli($host, $user, $pass,$db);
            
    //             if($con -> connect_error) {
    //                 echo "Database Connection Failed!";
    //                 echo "<br>";
    //                 echo $con -> connect_error;
    //             }
    //             else{


    //                 $stmt = $con->prepare("insert into DoctorSignup (fname, lname,gender,email,username,password,category,schedule,status) VALUES (?, ?, ?, ? ,?,?,?,?,?)");
                   
    //                $stmt -> bind_param("sssssssss", $fname,$lname,$genderD,$emailD,$username,$passwordD,$category,$schedule,$status);
                    
    //                $fname= $firstName;
    //                $lname= $lastName;
    //                $genderD=$gender;
    //                $emailD=$email;
    //                $username=$userName;
    //                $passwordD=$password;
    //                $category=$doctorType;
    //                $schedule=$schedule1.' to '.$schedule2;
    //                $status="inactive";
    //                 //Executing the statement
    //                 $stmt->execute();
    //                 //Closing the statement
    //                 $stmt->close();
    //                 //Closing the connection
    //                 $con->close();
    //                 $msg="successfully registration";
    //             }
	// 		}

    //         else{
    //             echo "<br>";
    //             $msg=   "Invalid  registered. Please try again!!" ;
    //         }
	// 	}
    
	// 
  
    ?>



    <!-- <form action="<?php //echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" -->

    <!-- <h1> Doctor Sign-up Form</h1> -->
    <div class="form">
        <a href="http://localhost/index.php">
            <h3> Doctors*House</h3>
        </a>

        <p class="contact"> <label for="firstName">First Name</label></p>
        <input type="text" id="firstName" name="fname" value="<?php echo $firstName ?>">
        <p class="contact">
        <p><?php echo $firstNameErr; ?></p>
        </p>

        <br>

        <p class="contact"><label for="lastName">Last Name</label></p>
        <input type="text" id="lastName" name="lname" value="<?php echo $lastName ?>">
        <p class="contact">
        <p><?php echo $lastNameErr; ?></p>
        </p>

        <br>
        <br>

        <label for="gender">Gender</label>
        <input type="radio" name="gender" id="gender" value="male">
        <label for="male">Male</label>
        <input type="radio" name="gender" id="female" value="female">
        <label for="female">Female</label>
        <p class="contact">
        <p><?php echo $genderErr; ?></p>
        </p>
        <br>
        <br>

        <p class="contact"><label for="email">Email</label></p>
        <input type="email" id="email" name="email" value="<?php echo $email ?>">
        <p class="contact">
        <p><?php echo $emailErr; ?></p>
        </p>

        <br>


        <p class="contact"> <label for="userName">User Name</label></p>
        <input type="text" id="userName" name="userName" value="<?php echo $userName ?>">
        <p class="contact">
        <p><?php echo $userNameErr; ?></p>
        </p>

        <br>

        <p class="contact"><label for="password">Password</label></p>
        <input type="password" id="password" name="password" value="<?php echo $password ?>">
        <p class="contact">
        <p><?php echo $passwordErr; ?></p>
        </p>

        <br>


        <label for="doctorType" class="select-style">Doctor Type</label>
        <select name="doctorType" id="doctorType">
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
        <br>
        <br>

        <label for="schedule1">Make Schedule:</label>

        <input class="schedule" type="time" id="appt" name="schedule1">

        <br>
        <label for="schedule2"> to </label>
        <span></span>
        <p><?php echo $schedule1Err; ?></p>
        <span></span>
        <input class="schedule" type="time" id="appt2" name="schedule2">
        <p><?php echo $schedule2Err; ?></p>
        <br>
        <div id="verify" style=" visibility:'hidden'; ">
            <p class="contact"><label for="vcode">Enter Mail Verfication code:</label></p>
            <input type="number" id="vcode" name="email" value="<?php echo $vcode;?>">

        </div>
        <button class="button" type="submit" onclick="submit()" value="Submit">SignUp</button>
        <p class="contact">
        <p><?php echo $msg; ?></p>
        </p>
        <p class="contact">
        <p id="p1"></p>
        </p>

    </div>

    <!-- <input type="submit" onclick="submit()" value="Submit"> -->

    <!-- </form> -->


    <script>
    document.getElementById("verify").style.visibility = 'hidden';

    function submit() {
        var fname = document.getElementById("firstName").value;
        var lname = document.getElementById("lastName").value;
        var gender = document.getElementById('gender').value
        var email = document.getElementById("email").value;
        var category = document.getElementById('doctorType').value;
        var username = document.getElementById("userName").value;
        var password = document.getElementById("password").value;
        var schedule1 = document.getElementById("appt").value;
        var schedule2 = document.getElementById("appt2").value;
        var vcode = document.getElementById("vcode").value;
        ///console.log(fname, gender, category, username);

        if (username == "" || password == "" || fname == "" || lname == "" || email == "" || schedule1 == "" ||
            schedule2 == "") {
            document.getElementById("p1").innerHTML = "Fill up the form properly";
            document.getElementById("p1").style.color = "red";
        } else {

            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("p1").innerHTML = xhttp.responseText;
                    document.getElementById("p1").style.color = "green";
                }
            }

            xhttp.open("POST", "http://localhost/Doctor/signupajax.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("fname=" + fname + "&lname=" + lname + "&gender=" + gender + "&email=" + email + "&username=" +
                username + "&password=" + password + "&category=" + category + "&schedule1=" + schedule1 +
                "&schedule2=" + schedule2 + "&vcode=" + vcode);
            document.getElementById("verify").style.visibility = 'visible';
        }
    }
    </script>

</body>

</html>