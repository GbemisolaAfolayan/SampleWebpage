<?php
session_start();
include("connection.php"); //Establishing connection with our database


if(isset($_GET['id']))
{
    $photoID = $_GET['id'];
    $deleteError = "Sorry, there was an error deleting the file.";

    $remsql = "DELETE FROM photos WHERE photoID='$photoID'";
    $query = mysqli_query($db, $remsql) or die(mysqli_error($db));
    if ($query) {
        header("Location: photos.php");
    }
    else {
        //xss safe echo
        function xecho($deleteError) {
            echo xssafe($deleteError);
        }

        //echo "Sorry, there was an error deleting the file.";
    }
    //echo $name." ".$email." ".$password

}

?>