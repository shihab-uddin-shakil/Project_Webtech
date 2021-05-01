<?php 
if(isset($_COOKIE['user']) && isset($_COOKIE['password'])){
    $user=$_COOKIE['user'];
    $password=$_COOKIE['password'];
    
    echo "<script>
    document.getElementById(userNamee).value='$user';
    document.getElementById(passworde).value='$password';
    </script>";
}
  
    $password=$username="";
    // $passwordErre=$userNameErre="";
    // $Erre="";
   // if(isset($_POST['login'])){
       

    if($_SERVER["REQUEST_METHOD"] == "POST") {

        $username = $_POST["username"];
        $password = $_POST["password"];
    
        if(empty($username) || empty($password)) {
            echo "Fill up the form properly";
        }
        else {
    
            $conn = new mysqli("localhost", "wta_user_1", "123", "wta");
    
            if($conn -> connect_error) {
                echo "Failed to connect database!";
            }
                else {
            
                    $sql = "select id, username, password from Admin";
                    $res1 = $conn->query($sql);
                    if($res1->num_rows > 0) {
                        while($row = $res1->fetch_assoc()) {
                            if($username==$row['username'] && $password==$row['password']){
                                setcookie('user',$row['username'],time()+60);
                                setcookie('password',$row['password'],time()+60);
                                session_start();
                                $_SESSION["userid"] =$userNamee;
                                $_SESSION["pass"] = $passworde;
                                $_SESSION["login"]="login";
                               header("location:http://localhost/Admin/Admin.php");
                               die();
                               
                                
                          }
                          else{
                           echo "Unable login ..UserName Or Passwor Invalid please Try again..!!";
                          }        
                        }
                    }
               
                
                
            }
            
        
           
      }
    //   else{
    //     $Erre="Unable login";
    //    }

    }
//}
    
	?>