<!DOCTYPE html>
<html>

<head>
    <title>Patient Control</title>
</head>

<body>

    <?php 
        session_start();
        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\Exception;
        
        // Load Composer's autoloader
        require 'vendor/autoload.php';
        $mail = new PHPMailer(true);
		$address=$name=$history=$medicine= $Gender=$doctorName=$doctorType=$patientName=$schedule= $contact = $visit= $age=$msg=$amount=$userNamee=$gender ="";
		$addressErr = $email=$contactErr = $visitErr = $ageErr=$nameErr=$historyErr=$medicineErr=$amountErr=$userNameErre="";

		if($_SERVER['REQUEST_METHOD'] == "POST"and isset($_POST['AddPatient']) )  {

			// if(empty($_POST['address'])) {
			// 	$addressErr = "Please fill up the Address";
			// }
			// else {
			//	$address = $_POST['address'];
			// }

			// if(empty($_POST['contact'])) {
            //     $contactErr = "Please fill up the  contact";
			// }
			// else {

                // $contact = $_POST['contact'];
			// //	$lastName = htmlspecialchars($_POST['lname']);
			// }

			if(empty($_POST['visit'])) {
				$visitErr = "Please fill up the visit date";
			}
			
			else {
				$visit = $_POST['visit'];
           
			}

            if(empty($_POST['age'])) {
				$ageErr = "Please fill up the age";
			}
			else {
				$age= $_POST['age'];
			}
            if(empty($_POST['amount'])) {
				$amountErr = "Please fill up the age";
			}
			else {
				$amount= $_POST['amount'];
			}
       
        // if(empty($_POST['name'])) {
        //     $nameErr = "Please fill up the Name";
        // }
        // else {
        //     $name = trim($_POST['name']);
            // $name = htmlspecialchars($_POST['name']);
           
        // }
        if(empty($_POST['history'])) {
            $historyErr = "Please fill up it";
        }
        else {
            $history= $_POST['history'];
        }
        if(empty($_POST['medicine'])) {
            $medicineErr = "Please fill up the Name";
        }
        else {
            $medicine= $_POST['medicine'];
        }
        
    

			if($addressErr == "" && $contactErr=="" &&  $visitErr == "" && $ageErr == "" && $nameErr == ""&& $historyErr == "" && $medicineErr == "") {
                $host = "localhost";
	            $user = "wta_user_1";
	             $pass = "123";
	            $db = "wta";
                // Mysqli object-oriented
                $con = new mysqli($host, $user, $pass,$db);
                $con2 = new mysqli($host, $user, $pass, $db);
            
                if($con -> connect_error && $con2 -> connect_error) {
                    echo "Database Connection Failed!";
                    echo "<br>";
                    echo $con -> connect_error;
                }
                else{

                 
                    $stmt = $con->prepare("insert into DoctorPatient2 (username,name,address,contact,gender,visitdate,age,history,medicine,amount,paid,due,duser) VALUES (?, ?, ?, ? ,?,?,?,?,?,?,?,?,?)");
                   
                   $stmt -> bind_param("ssssssissiiis", $_SESSION['puser'],$_SESSION['pname'],$_SESSION['paddress'],$_SESSION['pcontact'], $_SESSION['pgender'],$visit,$age,$history,$medicine,$amount,$paid,$amount,$_SESSION['userid']);
                //    $_SESSION['pname']=$name;
                //    $_SESSION['paddress']=$address;
                //    $_SESSION['pcontact']=$contact;
                //    $_SESSION['pgender']=$gender;
                //    $_SESSION['puser']=$row['username'];
                $stmt2 = $con2->prepare("insert into transaction (doctoruser,patientuser,activity,t_history) VALUES (?, ?, ?, ? )");
                $stmt2 -> bind_param("ssss",$d,$p,$a,$ta);
                $d=$_SESSION['userid'];
                $p=$_SESSION['puser'];
                $a="Patient Added";
                $ta=$_SESSION['userid']." added patient user ".$_SESSION['puser']." and ".$_POST['amount']." taka  added patient account";
                
                  $paid=0;
                   $due=$amount;
                    //Executing the statement
                    $stmt->execute();
                    $stmt2->execute();
                    //Closing the statement
                    $stmt->close();
                   
                //Closing the statement
                $stmt2->close();
                //Closing the connection
                $con2->close();
                    //Closing the connection
                    $con->close();
                    $msg="successfully added patient";
                }
			}
               
                 
			}

            
    
         else if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['NewPatient'])){

            if(empty($_POST['userNamee'])) {
                $userNameErre = "Please fill up the username";
            }
            else {
                $userNamee = $_POST['userNamee'];
            }
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
                            
                            $sql = "select id, fname, lname,email,contact,address,gender,username,status from PatientSignup";
                            $res1 = $conn1->query($sql);
                            if($res1->num_rows > 0) {
                                while($row = $res1->fetch_assoc()) {
                                    if($userNamee==$row['username'] && $row['status']=='active'){
                                       
                                        $name=$row['fname']." ".$row['lname'];
                                       $address=$row['address'];
                                       $contact=$row['contact'];
                                       $gender=$row['gender'];
                                       $_SESSION['pname']=$name;
                                       $_SESSION['paddress']=$address;
                                       $_SESSION['pcontact']=$contact;
                                       $_SESSION['pgender']=$gender;
                                       $_SESSION['puser']=$row['username'];
                                       $_SESSION['pemail']=$row['email'];
                                       
                                    }
                                    else{
                                       // $msg="inactive account";

                                    }
                                   
                                   
                                   
                                }
                            }
                        }
                    }
                    else if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['ExitPatient'])){

                        if(empty($_POST['userNamee'])) {
                            $userNameErre = "Please fill up the username";
                        }
                        else {
                            $userNamee = $_POST['userNamee'];
                        }
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
                                        
                                        $sql = "select id,username,name,address,contact,gender,visitdate,age,history,medicine,amount,due,duser from DoctorPatient2";
                                        $res1 = $conn1->query($sql);
                                        if($res1->num_rows > 0) {
                                            while($row = $res1->fetch_assoc()) {
                                                if($userNamee==$row['username'] && $row['duser']==$_SESSION['userid']){
                                                   
                                                    $name=$row['name'];
                                                   $address=$row['address'];
                                                   $contact=$row['contact'];
                                                   $gender=$row['gender'];
                                                   $amount=$row['amount'];
                                                   $medicine=$row['medicine'];
                                                  
                                                   $history=$row['history'];
                                                   $age=$row['age'];
                                                   $visit=$row['visitdate'];
                                                   $_SESSION['duep']=$row['due'];
                                                   $_SESSION['pname']=$row['name'];
                                                   $_SESSION['page']=$row['age'];
                                                   $_SESSION['pgender']=$row['gender'];
                                                   $_SESSION['pdate']=$row['visitdate'];
                                                   $_SESSION['pmedicine']=$row['medicine'];
                                                   $_SESSION['phistory']=$row['history'];
                                                   //$amount=$row['amount'];

                                                   
                                                }
                                                else{
                                                 //   $msg="account not found";
            
                                                }
                                               
                                               
                                               
                                            }
                                        }
                                    }
                                }

                                else if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['UpdatePatient'])) {
                                    // if(isset($_POST['Update'])&& $_SERVER['REQUEST_METHOD'] == "POST"){
                                         $host = "localhost";
                                         $user = "wta_user_1";
                                         $pass = "123";
                                         $db = "wta";
                                     
                                         // Mysqli object-oriented
                                         $conn1 = new mysqli($host, $user, $pass, $db);
                                         $con = new mysqli($host, $user, $pass, $db);
                                         if(empty($_POST['userNamee'])) {
                                            $userNameErre = "Please fill up the username";
                                        }
                                        else {
                                            $userNamee = $_POST['userNamee'];
                                        }
                                         
                                         if($conn1->connect_error &&$con->connect_error ) {
                                             echo "Database Connection Failed!";
                                             echo "<br>";
                                             echo $conn1->connect_error;
                                         }
                                         else{
                                            $stmt1 = $conn1->prepare("update DoctorPatient2 set visitdate=?,medicine=?,history=?,amount=?,due=? where username=?");
                                          //  mysqli_query($conn1,"UPDATE doctorpatient set visit='" . $_POST['visit'] . "', medicine='" . $_POST['first_name'] . "', last_name='" . $_POST['last_name'] . "', city_name='" . $_POST['city_name'] . "' ,email='" . $_POST['email'] . "' WHERE userid='" . $_POST['userid'] . "'");
                                             $stmt = $con->prepare("insert into transaction (doctoruser,patientuser,activity,t_history) VALUES (?, ?, ?, ? )");
                                           $stmt1->bind_param("sssiis", $_POST['visit'],$_POST['medicine'],$_POST['history'],$_POST['amount'],$du, $user);
                                             $stmt -> bind_param("ssss",$d,$p,$a,$ta);
                                             $user= $_SESSION['puser'];
                                            $du=$_POST['amount']+ $_SESSION['duep'];
                                             $d=$_SESSION['userid'];
                                             $p=$_SESSION['puser'];
                                             $a="Patient upadted";
                                             $ta=$_SESSION['userid']." updated patient user ".$_SESSION['puser']." and ".$_POST['amount']."taka  added patient account total due ".$du." taka";
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
                                     else if( isset($_POST['Send'])) {
                                        
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
                                            //$_SESSION['mail']=$_POST['email'];
                                            $m=$_POST['email'];
                                            // $name=$_POST['fname']." ".$_POST['lname'];
                                           // echo"i am mail";
                                            //Recipients
                                            $mail->setFrom('shihab.uddin121111@gmail.com', 'Doctors*House');
                                            $mail->addAddress($m,"patient");     // Add a recipient
                                            $allowedExts = array("pdf");
                                            $temp = explode(".", $_FILES["pdf_file"]["name"]);
                                            $extension = end($temp);
                                            $upload_pdf=$_FILES["pdf_file"]["name"];
                                            echo  $upload_pdf;
                                           // move_uploaded_file($_FILES["pdf_file"]["tmp_name"],"Downloads/" . $_FILES["pdf_file"]["name"]);
                                            // Attachement 
                                           $mail->addAttachment($upload_pdf);
                                           // $mail->addAttachment('upload/image.png', 'image 1');    // Optional name
                                        
                                            // Content
                                            //$token =rand(10,9999);
                                           // $_SESSION['key']=$token;
                                            $mail->isHTML(true); // Set email format to HTML
                                            $mail->Subject = 'Doctors*House Patient Prescript::';
                                            $mail->Body = '<h2>Assalamualikum  your prescript attached</h2>';
                                           // $mail->AltBody = 'A test email fromshihabuddinshakil9@gmail.com'; // Plain text for non-HTML mail clients
                                        
                                            $mail->send();
                                            echo '<h4>Prescript send..</h4>';
                                        } catch (Exception $e) {
                                            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                                        }
                                        
                                     }     
                    else{
                        echo "<br>";
                        // $msg=   "Invalid  Edited profile. Please try again!!" ;
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

            <h1>Control Patient</h1>


            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">

                <label for="userNamee">Search Patient</label>
                <input type="text" id="userNamee" name="userNamee" value="<?php echo $userNamee ?>">
                <input type="submit" name="NewPatient" value="NewPatient">
                <input type="submit" onclick="btnvisible();" name="ExitPatient" value="ExitPatient">

                <p><?php echo $userNameErre; ?></p>

                <label for="name">Name</label>
                <input type="text" id="" name="name" value="<?php echo $name ;?>" disabled>
                <p><?php echo $nameErr; ?></p>

                <br>
                <label for="address">Address</label>
                <input type="text" id="" name="address" value="<?php echo $address ;?>" disabled>
                <p><?php echo $addressErr; ?></p>

                <br>

                <label for="contact">Contact Number:</label>
                <input type="phone" id="" name="contact" value="<?php echo $contact; ?>" disabled>
                <p><?php echo $contactErr; ?></p>

                <br>
                <label for="gender">Gender:</label>
                <select name="gender">
                    <option value=" <?php echo $gender; ?>"> <?php echo $gender; ?> </option>
                </select>


                <br>
                <br>
                <label for="visit">Visit Date:</label>
                <input type="date" id="" name="visit" value="<?php echo $visit; ?>">
                <p><?php echo $visitErr; ?></p>

                <br>
                <br>

                <label for="age">Age :</label>
                <input type="number" id="" name="age" value="<?php echo $age; ?>">
                <p><?php echo $ageErr; ?></p>

                <br>
                <br>

                <label for="history">Patient History</label>
                <br>
                <input name="history" cols="40" rows="5" value="<?php echo $history; ?>"></input>

                <p><?php echo $historyErr; ?></p>

                <br>
                <br>
                <label for="medicine">Sugested Medicine</label>
                <br>
                <input name="medicine" cols="40" rows="5" value="<?php echo $medicine; ?>"></input>

                <p><?php echo $medicineErr; ?></p>

                <br>
                <label for="amount">Visit Amount:</label>
                <input type="number" id="" name="amount" value="<?php echo $amount; ?>">
                <p><?php echo $amountErr; ?></p>

                <br>
                <div id="divToPrint" style="display:none;">
                    <div style="width:800px;height:600px;background-color:teal;">
                        <div class="header">
                            <h2><?php echo $_SESSION["name"]; ?></h2>
                            <h4><?php echo$_SESSION["doctorType"]." Divission"; ?></h4>
                            <h4><?php echo "SLOT: ".$_SESSION["schedule"]; ?></h4>
                            <h4><?php echo "Email: ".$_SESSION["mail"]; ?></h4>

                        </div>
                        <br><br>
                        <div class="patient" style="display:inline;">
                            <p><?php echo $_SESSION['pname']; ?></p><span></span>
                            <p><?php echo $_SESSION['page']; ?></p><span></span>
                            <h4><?php echo $_SESSION['pdate']; ?></h4><span></span>
                            <h4><?php echo $_SESSION['pgender']; ?></h4>
                        </div>
                        <br>
                        <hr>
                        <div class="patient">
                            <h3><?php echo "HISTORY:"; ?></h3>
                            <h4><?php echo $_SESSION['phistory']; ?></h4>
                            <br><br>
                            <h3><?php echo "SUGESTED MEDICINE:"; ?></h3><span></span>
                            <h4><?php echo $_SESSION['pmedicine']; ?></h4>

                        </div>
                        <br>
                        <br>
                        <h2>POWERD BY DOCTORS*HOUSE</h2>
                    </div>
                </div>
                <br>
                <p><?php echo $msg; ?></p>


                <input type="submit" name="AddPatient" onclick="btnvisible();" value="AddPatient">
                <input type="submit" name="UpdatePatient" onclick="btnvisible();" value="UpdatePatient">
                <input type="button" id="printbtn" value="MakePrescript" onclick="PrintDiv();" />
                <!-- <button type="button"> Make
                    Prescript</button> -->

            </form>
            <hr>
            <form method="post" role="form" enctype="multipart/form-data">
                <input type="file" name="pdf_file" id="pdf_file" accept="application/pdf" />
                <!-- <button id="send" type="submit" name="submit" class="btn btn-success">Send</button> -->

                <input type="email" id="email" name="email" placeholder="enter email" value="<?php echo $email ?>">
                <input type="submit" id="Send" name="Send" value="Send">
            </form>
            <br>
            <hr>
            <script type="text/javascript">
            // document.getElementById("printbtn").style.display = "none";

            function PrintDiv() {
                var divToPrint = document.getElementById('divToPrint');
                var popupWin = window.open('', '_blank', 'width=800,height=600');
                popupWin.document.open();
                popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
                popupWin.document.close();
            }

            function btnvisible() {
                // document.getElementById("printbtn").style.visibility = "visible";
            }
            </script>

</body>

</html>