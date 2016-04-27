<?php
include('connection.php');
session_start();
$user_check=$_SESSION['username'];

$ses_sql = mysqli_query($db,"SELECT username, admin FROM users WHERE username='$user_check' ");

$row=mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

$login_user=$row['username'];
if($row['admin']==1){
    $adminuser = true;
}

if(!isset($user_check))
{
header("Location: index.php");
}
//session time out
if (!isset($_SESSION['username'])) {
    echo "Please Login again";
    echo "<a href='index.php'>Click Here to Login</a>";
}
else {

}
    $_SESSION['start'] = time(); // Taking now logged in time.
    // Ending a session in 10 minutes from the starting time.
    $_SESSION['expire'] = $_SESSION['start'] + (10 * 60);
    $now = time(); // Checking the time now when home page starts.

    if ($now > $_SESSION['expire']) {
        session_destroy();
        echo "Your session has expired! <a href='login.php'>Login here</a>";
    }
?>