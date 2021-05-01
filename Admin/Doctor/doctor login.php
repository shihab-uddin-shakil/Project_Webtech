<?php 
if(isset($_COOKIE['user']) && isset($_COOKIE['password'])){
    $user=$_COOKIE['user'];
    $password=$_COOKIE['password'];
    
    echo "<script>
    document.getElementById(userNamee).value='$user';
    document.getElementById(passworde).value='$password';
    </script>";
}
  
    $passworde=$userNamee="";
    $passwordErre=$userNameErre="";
    $Erre="";
    if(isset($_POST['login'])){
       

        if($_SERVER['REQUEST_METHOD'] == "POST"){

            if(empty($_POST['userNamee'])) {
                $userNameErre = "Please fill up the username";
            }
            else {
                $userNamee = $_POST['userNamee'];
            }
        
            if(empty($_POST['passworde'])) {
                $passwordErre = "Please fill up the password";
            }
            else {
                $passworde=$_POST['passworde'];
            }
            if($passwordErre == "" && $userNameErre == ""){
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
            
                    $sql = "select did,email,fname,lname,schedule,category, username, password,status from DoctorSignup";
                    $res1 = $conn1->query($sql);
                    if($res1->num_rows > 0) {
                        while($row = $res1->fetch_assoc()) {
                            if($userNamee==$row['username'] && $passworde==$row['password'] && $row['status']=="active"){
                                setcookie('user',$row['username'],time()+6000);
                                setcookie('password',$row['password'],time()+60000);
                                session_start();
                                $_SESSION["userid"] =$userNamee;
                                $_SESSION["pass"] = $passworde;
                                $_SESSION["schedule"]=$row['schedule'];
                                $_SESSION["doctorType"]=$row['category'];
                                $_SESSION["mail"]=$row['email'];
                                $_SESSION["name"]=$row['fname']." ".$row['lname'];
                                header("location:http://localhost/Doctor/DoctorDashboard.php");
                                die();
                               
                                
                          }
                          else{
                           $Erre="Unable login ..UserName And Passwor Invalid  Or Your Account is inactive please Try again..!!";
                          }        
                        }
                    }
                }
            }
            
        
           else{
            $Erre="Unable login";
           }
      }

    }
    
	?>

<html>

<head>
    <title>Doctor Login</title>
</head>

<body>



    <h1>Doctor Login</h1>

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">



        <label for="userNamee">User Name</label>
        <input type="text" id="userNamee" name="userNamee" value="<?php echo $userNamee ?>">
        <p><?php echo $userNameErre; ?></p>

        <br>

        <label for="passworde">Password</label>
        <input type="password" id="passworde" name="passworde" value="<?php echo $passworde ?>">
        <p><?php echo $passwordErre; ?></p>

        <br>
        <br>

        <p><?php echo $Erre; ?></p>


        <input type="submit" name="login" value="Login">

    </form>


</body>

</html>