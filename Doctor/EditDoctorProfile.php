<!DOCTYPE html>
<html>

<head>
    <title>Edit Profile</title>
</head>

<body>

    <?php 

		$address = $contact = $birth=  $religon=$file=$work=$qualification=$msg=$nid="";
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
            $qualification = $_POST['qualification'];
            $file = $_POST['file'];
            if(empty($_POST['work'])) {
				$workErr = "Please fill up the Working place";
			}
			else {
				$work= $_POST['work'];
			}
       
        if(empty($_POST['nid'])) {
            $nidErr = "Please fill up the NID";
        }
        else {
            $nid= $_POST['nid'];
        }

        
    

			if($addressErr == "" && $contactErr=="" && $schedule2Err=="" && $birthErr == "" && $workErr == "" && $nidErr == "") {

               // $address = $contact = $birth=  $religon=$file=$work=$qualification=$msg=$nid=""
                $arr1 = array('address' => $address, 'contact' => $contact, 'birth' => $birth,'religon' =>  $religon ,'work'=> $work,'nid'=> $nid,'qualification'=> $qualification,'file'=>$file );
                $json_encoded_text =  json_encode($arr1); 

		          $file1 = fopen("doctorProfile.txt", "w");
		         fwrite($file1, $json_encoded_text);

		          fclose($file1);
                  echo "<br>";
                  $msg=  " Successful  Updated" ;
                 
			}

            else{
                echo "<br>";
                $msg=   "Invalid  Edited profile. Please try again!!" ;
            }
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

        <label for="work">Working institution :</label>
        <input type="work" id="" name="work" value="<?php echo $work ?>">
        <p><?php echo $workErr; ?></p>

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

        <label for="qualification">Educatonal Qualificaton :</label>
        <select name="qualification">
            <option value=" M.B.B.S"> M.B.B.S</option>
            <option value=" F.C.B.S"> F.C.B.S</option>
            <option value=" F.R.C.S"> F.R.C.S</option>
            <option value=" B.S.C"> B.S.C</option>
            <option value="Diploma"> Diploma</option>

        </select>

        <br>
        <form action="upload.php" method="post" enctype="multipart/form-data">
            Select image to upload:
            <input type="file" name="fileToUpload" value="file" id="fileToUpload">
            <input type="submit" value="Upload Image" name="submit">
        </form>

        <br>
        <p><?php echo $msg; ?></p>


        <input type="submit" value="Submit">

    </form>

</body>

</html>