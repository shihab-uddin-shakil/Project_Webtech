<!DOCTYPE html>
<html>

<head>
    <title>All Patients</title>
</head>

<body>

    <?php 
      $userNamee=$Eid=$Email=$Ecgory=$Ename=$Estatus=$message=$userNameErre=$statusErre="";
    // $host = "localhost";
	// $user = "wta_user_1";
	// $pass = "123";
	// $db = "wta";

	// // Mysqli object-oriented
	// $conn1 = new mysqli($host, $user, $pass, $db);
            
    //             if($conn1->connect_error) {
    //                 $Erre= "Database Connection Failed!";
    //                 echo "<br>";
    //                 echo $conn1->connect_error;
    //             }
    //             else {
            
    //                 $sql = "select did, fname, lname,email,username,category,schedule,status from DoctorSignup";
    //                 $res1 = $conn1->query($sql);
    //                 $i=0;
    //                 if($res1->num_rows > 0) {
    //                     while($row = $res1->fetch_assoc( )) {
    //                        $status= $row['status'];
    //                        $id= $row['did'];
    //                        $name=$row['fname']." ".$row['lname'];
    //                        $schedule=$row['schedule'];
    //                       $dtype=$row['category'];
    //                       $email=$row['email'];
    //                       $username=$row['username'];
    //                        $i++;
    //                     }
    //                 }
    //             }
                if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['Go'])){

                    if(empty($_POST['userNamee'])) {
                        $userNameErre = "Please fill up the username";
                    }
                    else {
                        $userNamee = $_POST['userNamee'];
                    }
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
                            
                                    $sql = "select id, fname, lname,email,username,gender,status from PatientSignup";
                                    $res1 = $conn1->query($sql);
                                    if($res1->num_rows > 0) {
                                        while($row = $res1->fetch_assoc()) {
                                            if($userNamee==$row['username']){
                                                $Estatus= $row['status'];
                                                $Eid= $row['id'];
                                                $Ename=$row['fname']." ".$row['lname'];
                                               $Ecgory=$row['gender'];
                                               $Email=$row['email'];
                                               
                                            }
                                           
                                           
                                           
                                        }
                                    }
                                }
                }   
                
                
               else if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['Update'])) {
               // if(isset($_POST['Update'])&& $_SERVER['REQUEST_METHOD'] == "POST"){
                    $host = "localhost";
                    $user = "wta_user_1";
                    $pass = "123";
                    $db = "wta";
                
                    // Mysqli object-oriented
                    $conn1 = new mysqli($host, $user, $pass, $db);
                    $userNamee=$_POST['userNamee'];
                    if(empty($_POST['Estatus'])) {
                        $statusErr = " status empty";
                    }
                    else {
                        $Estatus=$_POST['Estatus'];
                    }
               
                    
                    if($conn1->connect_error) {
                        echo "Database Connection Failed!";
                        echo "<br>";
                        echo $conn1->connect_error;
                    }
                    else{
                        $stmt1 = $conn1->prepare("update PatientSignup set status=? where username=?");
                        $stmt1->bind_param("ss", $stus, $user);
                        $user=$_POST['userNamee'];
                        $stus=$_POST['Estatus'];
                        $status = $stmt1->execute();
                     if($status) {
                        $message= "Data Update Successful.";
                                    }
                        else {
                            $message= "Failed to Update Data."."<br>";
                         echo $conn1->error;
                            }
                    }
                   
               //}

                }
                

	// $conn1->close();


	?>
    <script>
    var stus = document.getElementById("status").value
    </script>

    <header>
        <?php
  include("navbar.php");
  ?>


    </header>
    <br>
    <br>
    <br>
    <div>

        <div>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">


                <div class="account">
                    <label for="userNamee">ACCOUNT:</label>
                    <input type="text" id="userNamee" name="userNamee" value="<?php echo $userNamee ?>">
                    <input type="submit" name="Go" value="Go">

                    <p><?php echo $userNameErre; ?></p>



                    <ul>
                        <li><?php echo $Eid; ?></li>
                        <li><?php echo $Ename; ?></li>
                        <li><?php echo $Ecgory; ?></li>
                        <li><?php echo $Email; ?></li>
                        <li><input type="text" id="Estatus" name="Estatus" value="<?php echo $Estatus ?>">
                            <p><?php echo $statusErre; ?></p>
                        </li>
                    </ul>

                    <br>
                    <br>
                    <p> <?php echo $message; ?> </p>
                    <br>
                    <br>
                    <input type="submit" method="POST" name="Update" value="Update">
            </form>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">

            </form>
        </div>
        <br>
        <br>
        <br>
        <br>
    </div>
    <div>
        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for patients..."
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
         
                 $sql = "select id, fname, lname,email,username,contact,address,gender,status from PatientSignup";
                 $res1 = $conn1->query($sql);
                 if($res1->num_rows > 0) {
?>
        <table id="myTable">
            <tr class="header">
                <th> #Id</th>
                <th> #Name</th>
                <th>Gender</th>
                <th>Contact</th>
                <th>Email</th>
                <th>Status</th>
                <th>UserName</th>
                <th>Address</th>


            </tr>

            <?php
			$i=0;
			while($row = mysqli_fetch_array($res1)) {
			?>

            <tr>
                <td><?php echo $row['id'] ; ?></td>
                <td><?php echo $row['fname']." ".$row['lname']; ?></td>
                <td><?php echo$row['gender']; ?></td>
                <td><?php echo $row['contact']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['status']; ?></td>
                <td><?php echo $row['username'];?></td>
                <td><?php echo $row['address'];?></td>
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