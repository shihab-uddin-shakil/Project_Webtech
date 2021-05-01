<script type="text/javascript">
function validate() {
    var isValid = false;
    var username = document.getElementById("userNamee").value;
    var password = document.getElementById("passworde").value;
    if (username == "" || password == "") {
        alert("Please fill up the form properly.");
        document.getElementById("errorMsg").innerHTML = "<b>Please fill up the form properly.</b>";
        document.getElementById("errorMsg").style.color = "red";
    } else {

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


//if($_SERVER['REQUEST_METHOD'] == "POST"){

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

$sql = "select id, username, password from Admin";
$res1 = $conn1->query($sql);
if($res1->num_rows > 0) {
while($row = $res1->fetch_assoc()) {
if($userNamee==$row['username'] && $passworde==$row['password']){
setcookie('user',$row['username'],time()+60);
setcookie('password',$row['password'],time()+60);
session_start();
$_SESSION["userid"] =$userNamee;
$_SESSION["pass"] = $passworde;
header("location:http://localhost/Admin/Admin.php");
die();


}
else{
$Erre="Unable login ..UserName Or Passwor Invalid please Try again..!!";
}
}
}



}



}
else{
$Erre="Unable login";
}

}
//}

?>
}


}
</script>



<html>

<head>
    <title>Admin Login</title>
</head>


<body>

    <div>
        <br><br>
        <a href="http://localhost/index.php">
            <h1>Home</h1>
        </a>
        <div>

            <hr>
            <br><br>

            <h3>Admin Login</h3>

            <form name="JsForm" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">



                <label for="userNamee">User Name</label>
                <input type="text" id="userNamee" name="userNamee" value="<?php echo $userNamee ?>">
                <p><?php echo $userNameErre; ?></p>

                <br>

                <label for="passworde">Password</label>
                <input type="password" id="passworde" name="passworde" value="<?php echo $passworde ?>">
                <p><?php echo $passwordErre; ?></p>

                <br>
                <br>

                <p id=""><?php echo $Erre; ?></p>
                <p id="errorMsg"></p>


                <input type="submit" name="login" onclick="validate()" value="Login">
            </form>



            <script>
            // function validate() {
            //     var isValid = false;
            //     var username = document.forms["jsForm"]["userNamee"].value;
            //     var password = document.forms["jsForm"]["passworde"].value;
            //     if (username == "" || password == "") {
            //         document.getElementById("errorMsg").innerHTML = "<b>Please fill up the form properly.</b>";
            //         document.getElementById("errorMsg").style.color = "red";
            //     } else {
            //         isValid = true;
            //     }

            //     return isValid;
            // }
            </script>

</body>

</html>