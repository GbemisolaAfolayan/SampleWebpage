<?php
session_start();
include("connection.php"); //Establishing connection with our database

$msg = ""; //Variable for storing our errors.
if(isset($_POST["submit"]))
{

    $desc = $_POST["desc"];
    $photoID = $_POST["photoID"];
    $name = $_SESSION["username"];

    $desc = stripslashes($desc);
    $photoID = stripslashes($photoID);
    $desc = mysqli_real_escape_string($db, $desc);
    $photoID = mysqli_real_escape_string($db, $photoID);

    /* create a prepared statement */
    if ($sql = $mysqli->prepare("SELECT userID FROM users WHERE username='$name'")) {

        /* bind parameters for markers */
        $sql->bind_param("s", $name);

        /* execute query */
        $sql->execute();

        /* bind result variables */
        $sql->bind_result($district);

        /* fetch value */
        $sql->fetch();

        //printf("%s is in district %s\n", $city, $district);

        /* close statement */
        $sql ->close();
    }

    $sql="SELECT userID FROM users WHERE username='$name'";
    $result=mysqli_query($db,$sql);
    $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
    if(mysqli_num_rows($result) == 1) {
        //echo $name." ".$email." ".$password;

        $id = $row['userID'];

       /* $addsql=$conn->prepare("INSERT INTO comments (description, postDate,photoID, userID) VALUES (?, ?, ?, ?)");
        $addsql->bind_param("sss",$desc, 'now()', $photoID. $id);
        $addsql->execute();

        if ($addsql) {
            $msg = "Thank You! comment added. click <a href='photo.php?id=".$photoID."'>here</a> to go back";
        }
    }
    else{
        $msg = "You need to login first";
    }
       */


        $addsql = "INSERT INTO comments (description, postDate,photoID,userID) VALUES ('$desc',now(),'$photoID','$id')";
        $query = mysqli_query($db, $addsql) or die(mysqli_error($db));
        if ($query) {
            $msg = "Thank You! comment added. click <a href='photo.php?id=".$photoID."'>here</a> to go back";
        }
    }
    else{
        $msg = "You need to login first";
    }
}

?>