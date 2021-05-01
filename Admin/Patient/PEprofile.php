<!DOCTYPE html>
<html>

<head>
    <title>Edit Patient Profile</title>
</head>

<body>

    <?php 

		$address = $contact = $birth=  $religon=$msg=$nid="";
		$addressErr = $contactErr = $birthErr = $workErr=$nidErr="";

		if($_SERVER['REQUEST_METHOD'] == "POST") {

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

			if(empty($_POST['birth'])) {
				$birthErr = "Please fill up the birthy date";
			}
			
			else {
				$birth = $_POST['birth'];
           
			}

         
            $religon = $_POST['religon'];
            
       
        if(empty($_POST['nid'])) {
            $nidErr = "Please fill up the NID";
        }
        else {
            $nid= $_POST['nid'];
        }

        
    

			if($addressErr == "" && $contactErr=="" &&  $birthErr == "" &&  $nidErr == "") {

               // $address = $contact = $birth=  $religon=$file=$work=$qualification=$msg=$nid=""
                $arr1 = array('address' => $address, 'contact' => $contact, 'birth' => $birth,'religon' =>  $religon ,'nid'=> $nid);
                $json_encoded_text =  json_encode($arr1); 

		          $file1 = fopen("PatientProfile.txt", "w");
		         fwrite($file1, $json_encoded_text);

		          fclose($file1);
                  echo "<br>";
                  $msg=  " Successful patient profile Edited" ;
                 
			}

            else{
                echo "<br>";
                $msg=   "Invalid  Edited profile. Please try again!!" ;
            }
		}
    
	?>
 <div>
              <a href="http://localhost/Patient/PatientDashboard.php">
                        <h1>Patient Dashboard</h1>
                    </a>
                    <a href="http://localhost/Patient/logout.php">logout</a>
                    <hr>

                </div>


<div>
    <h1>Edit Patient Profile</h1>

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">

        <label for="address">Address</label>
        <input type="text" id="" name="address" value="<?php echo $address ?>">
        <p><?php echo $addressErr; ?></p>

        <br>

        <label for="contact">Contact Number:</label>
        <input type="phone" id="" name="contact" value="<?php echo $contact ?>">
        <p><?php echo $contactErr; ?></p>

        <br>
        <br>
        <label for="birth">Date Of Birth:</label>
        <input type="date" id="" name="birth" value="<?php echo $birth ?>">
        <p><?php echo $contactErr; ?></p>

        <br>
        <br>
        <label for="religon">
            Religion :
        </label>
        <select name="religon">
            <option value="religion">Religion</option>
            <option value="islam">Islam</option>
            <option value="Hindu">Hindu</option>
            <option value="Chirishtan">Chirishtan</option>
            <option value="Ihudi">Ihudi</option>
        </select>
        <br>
        <br>

        <label for="nid">NID number</label>
        <input type="text" id="nid" name="nid" value="<?php echo $nid ?>">
        <p><?php echo $nidErr; ?></p>

        <br>
        <br>
        <p><?php echo $msg; ?></p>


        <input type="submit" value="EditProfile">

    </form>

</body>

</html>