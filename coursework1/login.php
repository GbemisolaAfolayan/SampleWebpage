<?php
/**
 * Created by PhpStorm.
 * User: Oluwagbemisola
 * Date: 16/03/2016
 * Time: 11:48
 */

include("connection.php");

echo "i am working";

if(isset($_POST["submit"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phoneextention = $_POST["phoneextention"];
    $password = $_POST["password"];

//if(empty($_POST["username"]) || empty($_POST["email"]) || empty($_POST["phone extention"]) || empty($_POST["password"]))
//{
}
else {

    echo "All fields are required.";
}
//else
//{

   /* $username=$_POST['username'];
    $email=$_POST['email'];
    $phoneextention=$_POST['phone extention'];
    $password=$_POST['password'];


    $sql="SELECT * FROM users WHERE username='$username' and email='$email' and phone extention='$phoneextention' and password='$password'";

    $result=mysqli_query($db,$sql);

    if(mysqli_num_rows($result) == 1)
    {
        header("location: buglist.php?username=".$username); // Redirecting To another Page
    }else
    {
        echo "Incorrect username or password.";
    }
}
*/
?>