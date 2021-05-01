<?php

session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';
$mail = new PHPMailer(true);


// Instantiation and passing `true` enables exceptions

             $vcode=$vcodeErr="";
            // echo"i am here";

			if(empty($_POST['fname'])||empty($_POST['lname'])||empty($_POST['email'])||empty($_POST['username'])||empty($_POST['password'])) {
				echo "Please fill up the Registration form properly..";
			}
			else {
                
               
				if(empty($_POST['vcode'])){
                    try {
                    
                        //Server settings
                        $mail->SMTPDebug = 0;                                       // [server]$ pear install --alldeps Mail0 - Disable Debugging, 2 - Responses received from the server
                        $mail->isSMTP();                                            //shihab.uddin121111@gmail.com Set mailer to use SMTP
                        $mail->Host       = 'tls://smtp.gmail.com:587';  // Specify main and backup SMTP servers
                        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                        $mail->Username   = 'shihab.uddin121111@gmail.com';                     // SMTP username
                        $mail->Password   = 'Shihabuddin121111#';                               // SMTP password
                        //$mail->SMTPSecure = 'tls';//PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption, `PHPMailer::ENCRYPTION_SMTPS` also accepted
                        //$mail->Port       = 587;                                    // TCP port to connect to
                        $_SESSION['mail']=$_POST['email'];
                        $m=$_POST['email'];
                        $name=$_POST['fname']." ".$_POST['lname'];
                       // echo"i am mail";
                        //Recipients
                        $mail->setFrom('shihab.uddin121111@gmail.com', 'Doctors*House');
                        $mail->addAddress($m,$name);     // Add a recipient
                      
                        // Attachement 
                       // $mail->addAttachment('upload/file.pdf');
                       // $mail->addAttachment('upload/image.png', 'image 1');    // Optional name
                    
                        // Content
                        $token =rand(10,9999);
                        $_SESSION['key']=$token;
                        $mail->isHTML(true); // Set email format to HTML
                        $mail->Subject = 'Doctors*House Confirmation::';
                        $mail->Body = '<h2>Assalamualikum '.$name.",</h2><br>".'<h3>Your verification code is '.$token."</h3>";
                       // $mail->AltBody = 'A test email fromshihabuddinshakil9@gmail.com'; // Plain text for non-HTML mail clients
                    
                        $mail->send();
                        echo '<h4>Verification code has been sent Please verified your email..</h4>';
                    } catch (Exception $e) {
                        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                    }
                }
               else if($_POST['vcode']!=0){
                   if($_SESSION['key']==$_POST['vcode']){
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
    
    
                        $stmt = $con->prepare("insert into DoctorSignup (fname, lname,gender,email,username,password,category,schedule,status) VALUES (?, ?, ?, ? ,?,?,?,?,?)");
                       
                       $stmt -> bind_param("sssssssss", $_POST['fname'],$_POST['lname'],$_POST['gender'],$_POST['email'], $_POST['username'], $_POST['password'], $_POST['category'],$schedule,$status);
                        
                       //$fname= $firstName;
                       //$lname= $lastName;
                      // $genderD=$gender;
                      // $emailD=$email;
                     //  $username=$userName;
                       //$passwordD=$password;
                      // $category=$doctorType;
                       $schedule=$_POST['schedule1'].' to '.$_POST['schedule2'];
                       //echo  $fname. $lname.$genderD.$emailD.$username;
                       $status="inactive";
                        //Executing the statement
                        $stmt->execute();
                        //Closing the statement
                        $stmt->close();
                        //Closing the connection
                        $con->close();
                        echo "<h3>successfully registration Completed. Your account active will within 24 hours </h3>";
                    }
                //}
                   }
                   else{
                    echo"<h4>Wrong verification code..</h4>";
                   }

                }
			}

			
		
    
	?>