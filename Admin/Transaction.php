<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction</title>
</head>

<body>
    <header>
        <?php
  include("navbar.php");
  ?>


    </header>
    <br>
    <br>

    <h1>All Transaction</h1>
    <hr>
    <br>
    <br>
    <br>
    <div>
        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for transaction..."
            title="Type in a name">
        <br><br>
        <?php
       
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
     
             $sql = "select id, doctoruser,patientuser,activity,t_history from transaction";
             $res1 = $conn1->query($sql);
             if($res1->num_rows > 0) {
?>
        <table id="myTable">
            <tr class="header">
                <th> #Id</th>
                <th> #Doctor UserName</th>
                <th>#Patient UserName</th>
                <th>Activity</th>
                <th>History</th>

            </tr>

            <?php
        $i=0;
        while($row = mysqli_fetch_array($res1)) {
        ?>

            <tr>
                <td><?php echo $row['id'] ; ?></td>
                <td><?php echo $row['doctoruser']; ?></td>
                <td><?php echo$row['patientuser']; ?></td>
                <td><?php echo $row['activity']; ?></td>
                <td><?php echo $row['t_history']; ?></td>

            </tr>

            <?php
        $i++;
             }
     
    
        ?>
        </table>
        <?php
}
}
$conn1->close();

?>

    </div>
    <br>


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