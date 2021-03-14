<!DOCTYPE html>
<html>

<head>
    <title>doctor</title>
</head>

<body>

    <?php 
    session_start();
    $file2 = fopen("C:/xampp/htdocs/Doctor/doctor.txt", "r");
    $read = fread($file2, filesize("C:/xampp/htdocs/Doctor/doctor.txt"));
    fclose($file2);
    $file3 = fopen("C:/xampp/htdocs/Doctor/doctorProfile.txt", "r");
    $read1 = fread($file3, filesize("C:/xampp/htdocs/Doctor/doctorProfile.txt"));
    fclose($file3);

    $json_decoded_text = json_decode($read, true);
    $character1 = json_decode($read1, true);
  
       //foreach ($json_decoded_text as $character) {
        $doctorname= $json_decoded_text['fname']."  ".$json_decoded_text['lname'] ;
        $Email=$json_decoded_text['email'];
        $schedule=$json_decoded_text['schedule'];
   // }
    //foreach ($json_decoded_text1 as $character1) {
        $address= $character1['address'] ;
        $contact=$character1['contact'];
        $work=$character1['work'];
        $qualification=$character1['qualification'];
   // }
    
	?>
   <div>
                    <a href="http://localhost/Patient/PatientDashboard.php">
                        <h1>Patient Dashboard</h1>
                    </a>
                    <a href="http://localhost/Patient/findDoctorS.php">
                        <h1>Back</h1>
                    </a>
                    <a href="http://localhost/Patient/logout.php">logout</a>
                    <hr>

                </div>
    <div>
        <div>
            <h1><?php echo $doctorname; ?></h1>
            <hr>
            <h2>Personal information</h2>
            <h3><?php echo $address; ?></h3>
            <h3><?php echo $qualification; ?></h3>
            <h3><?php echo $work; ?></h3>
            <h2>Communication</h2>
            <h3><?php echo $contact; ?></h3>
            <h3><?php echo $Email; ?></h3>
            <h2>Schedule for visit:</h2>
            <h3><?php echo $schedule; ?></h3>
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