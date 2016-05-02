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

//Session IP bind
$IP = getenv ( "REMOTE_ADDR" );
$_SESSION['IP'] = $IP;
if (isset ($_SESSION['IP'])){
//echo $IP;

    if (!$_SESSION['IP'] == getenv('REMOTE_ADDR'))
    {
        header("Location: index.php");
    }
}
//session time out
if (isset($_SESSION['timeout']))
    { $timein = $_SESSION['timeout'];
    $time_diff = time() - $timein;

        if ($time_diff >= 300)
    { //session expire
        session_unset();
        session_destroy();
        header("Location: index.php");
    }
       // else {
      //  $_SESSION['timeout'] = time(); }
}
else {
    $_SESSION['timeout'] = time();

}

?>