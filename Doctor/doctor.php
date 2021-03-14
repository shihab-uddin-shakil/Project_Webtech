<!DOCTYPE html>
<html>

<head>
    <title>doctor</title>
</head>

<body>

    <?php 
    session_start();
    $file2 = fopen("information.txt", "r");
    $read = fread($file2, filesize("information.txt"));
    fclose($file2);

    $json_decoded_text = json_decode($read, true);
   // echo $json_decoded_tex;
    //$json_decoded_text= array($json_decoded_tex);
   // echo $json_decoded_text;
   // $json_decoded_text=json_decode($json_decoded_tt);
   // 


    //   $_SESSION["userid"] = $json_decoded_text['userId'];
    //    $_SESSION["pass"] = $json_decoded_text['password'];
    //    $_SESSION["fname"] = $json_decoded_text['fname'];
    //    $_SESSION["lname"] = $json_decoded_text['lname'];
    // //    $characters = $json_decoded_text[0];
    //    echo $characters[0]->userId;
     //for table data
    //    $userI = $json_decoded_text['userId'];
    //    $passw = $json_decoded_text['password'];
    //    $faname = $json_decoded_text['fname'];
    //    $laname = $json_decoded_text['lname'];
   // echo  $json_decoded_text[0] ['userId'];
       foreach ($json_decoded_text as $character) {
        //$userI= $character['userId'] ;
    }
    
    
	?>
    <div class="topnav">
        <a class="active" href="#home">Home</a>
        <a href="#news">Manage Doctor</a>
        <a href="doctor.php">Manage Patient</a>
        <a href="#about">Log Out</a>
    </div>
    <div>
        <br>
        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
        <br><br>

        <table id="myTable">
            <tr class="header">
                <th>First Name</th>
                <th>Last Name</th>
                <th>User Id</th>
                <th>Email</th>
                <th>Gender</th>
            </tr>

            <?php foreach ($json_decoded_text as $character) : ?>
            <?php if($character['accountType']=="doctor") : ?>
            <tr>
                <td><?php echo $character['fname']; ?></td>
                <td><?php echo $character['lname']; ?></td>
                <td><?php echo $character['userId']; ?></td>
                <td><?php echo $character['email']; ?></td>
                <td><?php echo $character['gender']; ?></td>
            </tr>
            <?php endif; ?>
            <?php endforeach; ?>
        </table>

    </div>

    <script>
    function myFunction() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
    </script>
</body>

</html>