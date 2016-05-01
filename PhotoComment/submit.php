<?php
session_start();
include ("connection.php");
//xss safe output - sanitizing output
function xecho($msg){echo xssafe($msg);}
$msg = "";
if(isset($_POST["submit"]))
{
    $name = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $msg1 = "Sorry...This email already exists...";
    $msg2 = "Thank You! you are now registered. click <a href='index.php'>here</a> to login";

    //prevents xss
    $name = htmlspecialchars($_POST["username"]);
    $name =xss_erase($name);
    $email = htmlspecialchars($_POST["email"]);
    $email =xss_erase($email);
    $password = htmlspecialchars($_POST["password"]);



    // strips special charachers
    $username = stripslashes($username);
    $email = stripslashes($email);
    $password = stripslashes($password);
    $username = mysqli_real_escape_string($db, $username);
    $email = mysqli_real_escape_string($db, $email);
    $password = mysqli_real_escape_string($db, $password);
    $password = md5($password);

    $sql="SELECT email FROM users WHERE email='$email'";
    $result=mysqli_query($db,$sql);
    $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
    if(mysqli_num_rows($result) == 1)
    {   /*xss afe echo
        function xecho($msg1) {
        echo xssafe($msg1);
        }*/
        $msg = "Sorry...This email already exists...";
    }
    else
    {
        /*//echo $name." ".$email." ".$password;
        $query = $conn->prepare ("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        $query->bind_param("sss", $username, $email, $password);
        $query->execute();
        */

        $query = mysqli_query($db, "INSERT INTO users (username, email, password) VALUES ('$name', '$email', '$password')")or die(mysqli_error($db));
        if($query)
        {   /*xss safe echo
            function xecho($msg2) {
                echo xssafe($msg2);
            }*/
            $msg = "Thank You! you are now registered. click <a href='index.php'>here</a> to login";
        }

    }
}
?>