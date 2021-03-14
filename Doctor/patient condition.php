<!DOCTYPE html>
<html>

<head>
    <title>All doctors</title>
</head>

<body>
<?php 

?>

    <?php 
    $file2 = fopen("doctorPatient.txt", "r");
    $read = fread($file2, filesize("doctorPatient.txt"));
    fclose($file2);

    $json_decoded_text = json_decode($read, true);
    $name=$json_decoded_text['name'];
    $history=$json_decoded_text['medicine'];
    $medicine= $json_decoded_text['history'];

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
    <div>
        <br>
        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for doctors..."
            title="Type in a name">
        <br><br>

        <table id="myTable">
            <tr class="header">
                <th> #Name</th>
                <th>Conditions</th>
                <th>Given Medicine</th>

            </tr>



            <tr>
                <td><?php echo $name; ?></td>
                <td><?php echo $history; ?></td>
                <td><?php echo $medicine; ?></td>
            </tr>


        </table>

    </div>
    <footer>

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