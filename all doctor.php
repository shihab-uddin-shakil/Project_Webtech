<!DOCTYPE html>
<html>

<head>
    <title>All doctors</title>
</head>

<body>

    <?php 
    $file2 = fopen("C:/xampp/htdocs/Doctor/doctor.txt", "r");
    $read = fread($file2, filesize("C:/xampp/htdocs/Doctor/doctor.txt"));
    fclose($file2);

    $json_decoded_text = json_decode($read, true);
    $name=$json_decoded_text['fname']. "  ".$json_decoded_text['lname'];
    $schedule=$json_decoded_text['schedule'];
    $dtype= $json_decoded_text['doctorType'];

	?>
    <header>
        <header>

            <?php 

include('header.php');
?>
        </header>

    </header>
    <div>
        <br>
        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for doctors..."
            title="Type in a name">
        <br><br>

        <table id="myTable">
            <tr class="header">
                <th> #Name</th>
                <th>Schedule</th>
                <th>Doctor Type</th>

            </tr>



            <tr>
                <td><?php echo $name; ?></td>
                <td><?php echo $schedule; ?></td>
                <td><?php echo $dtype; ?></td>
            </tr>


        </table>

    </div>
    <footer>
        <?php 
    
    include('footer.php');
	?>
    </footer>

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