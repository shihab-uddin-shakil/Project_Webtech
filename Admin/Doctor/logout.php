<?php
session_start();
session_destroy();
if(isset($_COOKIE['user']) && isset($_COOKIE['password'])){
    $user=$_COOKIE['user'];
    $password=$_COOKIE['password'];
    setcookie('user',$user,time()-1);
    setcookie('password',$password,time()-1);
}
echo "You have successfully logout..click here to login... <a href='http://localhost/Doctor/doctor login.php'>
<h2>Login</h2>
</a><a href='http://localhost/index.php'>
<h2>Home</h2>
</a>";
?>