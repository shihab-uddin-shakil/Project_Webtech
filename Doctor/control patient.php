<!DOCTYPE html>
<html>

<head>
    <title>Patient Control</title>
</head>

<body>

    <?php 

		$address=$name=$history=$medicine = $contact = $visit= $age=$msg="";
		$addressErr = $contactErr = $visitErr = $ageErr=$nameErr=$historyErr=$medicineErr="";

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
       
        if(empty($_POST['name'])) {
            $nameErr = "Please fill up the Name";
        }
        else {
            $name= $_POST['name'];
        }
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

               
                $arr1 = array('address' => $address, 'contact' => $contact, 'visit' => $visit,'history' =>  $history ,'age'=> $age,'name'=> $name, 'medicine'=>$medicine );
                $json_encoded_text =  json_encode($arr1); 

		          $file1 = fopen("doctorPatient.txt", "w");
		         fwrite($file1, $json_encoded_text);

		          fclose($file1);
                  echo "<br>";
                  $msg=  " Successful  Added.." ;
                 
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

    <h1>Control Patient</h1>
    

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">

        <label for="name">Name</label>
        <input type="text" id="" name="name" value="<?php echo $name ;?>">
        <p><?php echo $nameErr; ?></p>

        <br>
        <label for="address">Address</label>
        <input type="text" id="" name="address" value="<?php echo $address ;?>">
        <p><?php echo $addressErr; ?></p>

        <br>

        <label for="contact">Contact Number:</label>
        <input type="phone" id="" name="contact" value="<?php echo $contact; ?>">
        <p><?php echo $contactErr; ?></p>

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
        <textarea name="history" cols="40" rows="5"value="<?php echo $history; ?>"></textarea>
        
        <p><?php echo $historyErr; ?></p>

        <br>
        <br>
        <label for="medicine">Sugested Medicine</label>
        <br>
        <textarea name="medicine" cols="40" rows="5"value="<?php echo $medicine; ?>"></textarea>
        
        <p><?php echo $medicineErr; ?></p>

        <br>
        <br>

        <br>
        <p><?php echo $msg; ?></p>


        <input type="submit" value="Add Patient">

    </form>
    

</body>

</html>