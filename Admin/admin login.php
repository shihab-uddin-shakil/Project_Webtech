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
                //admin user
                $file2 = fopen("./information.txt", "r");
                $read = fread($file2, filesize("./information.txt"));
                fclose($file2);
                $json_decoded_text = json_decode($read, true);
               
                if($userNamee==$json_decoded_text['userId'] && $passworde==$json_decoded_text['password']){
                      setcookie('user',$json_decoded_text['userId'],time()+60);
                      setcookie('password',$json_decoded_text['password'],time()+60);
                     header("location:http://localhost/Admin/Admin.php");
                     die();
                     
                      session_start();
                      $_SESSION["userid"] =$userNamee;
                      $_SESSION["pass"] = $passworde;
                }
                else{
                 $Erre="Unable login ..UserName Or Passwor Invalid please Try again..!!";
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
    <title>Login</title>
</head>

<body>



    <h1>Admin Login</h1>

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