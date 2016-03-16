<?php
/**
 * Created by PhpStorm.
 * User: Oluwagbemisola
 * Date: 16/03/2016
 * Time: 11:48
 */

include("connection.php");
if(empty($_POST["username"]) || empty($_POST["email"]) || empty($_POST["phone extention"]))
{
    echo "All fields are required.";
}else
{
    $username=$_POST['username'];
    $email=$_POST['email'];
    $phoneextention=$_POST['phone extention']

    $sql="SELECT * FROM users WHERE username='$username' and email='$email' and phone extention='$phoneextention'";

    $result=mysqli_query($db,$sql);

    if(mysqli_num_rows($result) == 1)
    {
        header("location: bughome.php?username=".$username); // Redirecting To another Page
    }else
    {
        echo "Incorrect username or password.";
    }
}

?>