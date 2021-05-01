<!DOCTYPE html>
<html>

<head>
    <title>All doctors</title>
</head>

<body>


    <header>
        <header>

            <?php 

include('header.php');
?>
        </header>

    </header>
    <div>

    </div>
    <br>
    <br>
    <br>
    <br>

    <div>
        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for doctors..."
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
         
                 $sql = "select  fname, lname,email,username,category,schedule from DoctorSignup";
                 $res1 = $conn1->query($sql);
                 if($res1->num_rows > 0) {
?>
        <table id="myTable">
            <tr class="header">

                <th> #Name</th>
                <th>Schedule</th>
                <th>Doctor Type</th>
                <th>Email</th>



            </tr>

            <?php
			$i=0;
			while($row = mysqli_fetch_array($res1)) {
			?>

            <tr>

                <td><?php echo $row['fname']." ".$row['lname']; ?></td>
                <td><?php echo$row['schedule']; ?></td>
                <td><?php echo $row['category']; ?></td>
                <td><?php echo $row['email']; ?></td>


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