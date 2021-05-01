<!DOCTYPE html>
<html>

<head>
    <title>All doctors</title>
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
                            
                                    $sql = "select did, fname, lname,email,username,category,status from DoctorSignup";
                                    $res1 = $conn1->query($sql);
                                    if($res1->num_rows > 0) {
                                        while($row = $res1->fetch_assoc()) {
                                            if($userNamee==$row['username']){
                                                $Estatus= $row['status'];
                                                $Eid= $row['did'];
                                                $Ename=$row['fname']." ".$row['lname'];
                                               $Ecgory=$row['category'];
                                               $Email=$row['email'];
                                               
                                            }
                                           
                                           
                                           
                                        }
                                    }
                                }
                }   
                
                
                if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['Update'])) {
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
                        $stmt1 = $conn1->prepare("update DoctorSignup set status=? where username=?");
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
    <?php
  include("navbar.php");
  ?>
    <br>
    <br>
    <br>
    <div>

        <div>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" id="self_profile" method="POST">


                <div class="account">
                    <label for="userNamee">Account:</label>
                    <input type="text" id="userNamee" name="userNamee" value="<?php echo $userNamee ?>">
                    <input type="submit" name="Go" value="Go">
                    <!-- <button type="submit" onclick="search()" onclick="search()"name="Go" value="Go">Serarch</button> -->
                    <!-- <button type="submit" onclick="search()" name="Go" value="Go">Serarch</button> -->

                    <p><?php echo $userNameErre; ?></p>



                    <ul>
                        <li id="Eid"><?php echo $Eid; ?></li>
                        <li id="Ename"><?php echo $Ename; ?></li>
                        <li id="Ecgory"><?php echo $Ecgory; ?></li>
                        <li id="Email"><?php echo $Email; ?></li>
                        <li><input type="text" id="Estatus" name="Estatus" value="<?php echo $Estatus ?>">
                            <p><?php echo $statusErre; ?></p>
                        </li>
                    </ul>

                    <br>
                    <br>
                    <p> <?php echo $message; ?> </p>
                    <br>
                    <br>
                    <input type="submit" class="update" method="POST" name="Update" value="Update">
            </form>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">

            </form>
        </div>
        <br>
        <br>
        <br>
        <br>
        <p id="p1"></p>
    </div>
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
         
                 $sql = "select did, fname, lname,email,username,category,schedule,status from DoctorSignup";
                 $res1 = $conn1->query($sql);
                 if($res1->num_rows > 0) {
?>
        <table id="myTable">
            <tr class="header">
                <th> #Id</th>
                <th> #Name</th>
                <th>Schedule</th>
                <th>Doctor Type</th>
                <th>Email</th>
                <th>Status</th>
                <th>UserName</th>
                <th>Action</th>


            </tr>

            <?php
			$i=0;
			while($row = mysqli_fetch_array($res1)) {
			?>

            <tr>
                <td><?php echo $row['did'] ; ?></td>
                <td><?php echo $row['fname']." ".$row['lname']; ?></td>
                <td><?php echo$row['schedule']; ?></td>
                <td><?php echo $row['category']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['status']; ?></td>
                <td><?php echo $row['username'];?></td>
                <td><a href="delete-process.php?did=<?php echo $row["did"]; ?>">Delete</a></td>
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
    function search() {
        var username = document.getElementById("userNamee").value;

        if (userNamee === "") {
            document.getElementById("p1").innerHTML = "Username is empty!!!";
            document.getElementById("p1").style.color = "red";
        }
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("self_profile").innerHTML = xhttp.responseText;
                console.log(xhttp.responseText);
            }
        }

        xhttp.open("GET", "http://localhost/Admin/controldoc.php?username" + username, true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        xhttp.send();
    }

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