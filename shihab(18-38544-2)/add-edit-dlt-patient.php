<!DOCTYPE html>
<html lang="en-US">
<head>
	<title>
		First Page
	</title>
</head>
<body>
    <?php

    $f = fopen("addPatient.txt", "r");
    $read = fread($f, filesize("addPatient.txt"));
    fclose($f);

    $f1 = fopen("editPatient.txt", "r");
    $read1 = fread($f1, filesize("editPatient.txt"));
    fclose($f1);

    $json_decoded_text = json_decode($read, true);
    $character1 = json_decode($read1, true);

    foreach ($json_decoded_text as $character) {
        $Patient= $character['fname']."  ".$character['lname'] ;
        $Address=$character['Address'];
        $Phone=$character['Phone'];
    }

    ?>
<div>  
    <h1>Add Patient, Edit Patient and Delete Petient</h1>  
    <b>First name:</b><input type="text" id="firstName" /><br /> 
    <b>Last name:</b><input type="text" id="lastName" /><br />  
    <b>Address</b><input type="text" id="Address" /><br />  
    <b>Phone:</b>  
    <b><input type="tel" id="phone" name="phone" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}"/><b/>


    <b>Email:</b><input type="text" id="email" /><br />  
    <button onclick="InsertData()">Insert Petient</button>  
    <button onclick="UpdateData()">Edit Petient</button>  
    <button onclick="ClearData()">Delete Petient</button>  
    <br />  
    <br />  
    <br />  
    <div id="details"></div>  
</div>
	</body>
</html>