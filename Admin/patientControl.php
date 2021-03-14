<!DOCTYPE html>
<html>

<head>
    <title>All doctors</title>
</head>

<body>

    <?php 
    $file2 = fopen("C:/xampp/htdocs/Patient/patient.txt", "r");
    $read = fread($file2, filesize("C:/xampp/htdocs/Patient/patient.txt"));
    fclose($file2);

    $json_decoded_text = json_decode($read, true);
    $name=$json_decoded_text['fname']. "  ".$json_decoded_text['lname'];
   // $schedule=$json_decoded_text['schedule'];
    //$dtype= $json_decoded_text['doctorType'];
    $id= $json_decoded_text['userId'];
    $email= $json_decoded_text['email'];



	?>
    <header>
    <div>
                    <a href="http://localhost/Admin/Admin.php">
                        <h1>Admin</h1>
                    </a>
                    <a href="http://localhost/Admin/logout.php">logout</a>
                    <hr>

                </div>


    </header>
    <div>
        <br>
        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for doctors..."
            title="Type in a name">
        <br><br>

        <table id="myTable">
            <tr class="header">
            <th> #Id</th>
                <th> #Name</th>
                <th>Email</th>

            </tr>



            <tr>
            <td><?php echo $id; ?></td>
                <td><?php echo $name; ?></td>
                <td><?php echo $email; ?></td>
            </tr>


        </table>

    </div>
    <footer>
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