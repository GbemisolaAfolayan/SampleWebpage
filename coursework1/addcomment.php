<?php
session_start();
include("connection.php");
include("check.php");
include("bug.php");

?>

<html>
<head>  </head>

<body>
<div id="content">
    <?php

    //collect data from bug.php
    $comment=$_POST["comment"];
    $user=$_SESSION['username'];
    $userID=$_SESSION['userID'];
   // $bugID=$_POST['bugID'];
    $bugID= $_GET['bugID'];
    //$bugfile=$_POST["file"];


    //strip special characters, protect from MySQL injection
    $comment= mysqli_real_escape_string($db,$comment);

       echo $bugID;
    //select everything from the bug table where the ID is right
    $sql2="SELECT *FROM bugs WHERE bugID=".$_GET["bugID"];

    //  $query=mysqli_query($db,"INSERT INTO bugs (title, desc, postDate, fixDate, fixed) VALUES ('$title','$desc','$postDate','$fixDate','$fixed')");

    //else
  //  $query2 = mysqli_query($db, "SELECT * FROM bugs WHERE bugID = '$bugID'") or die (mysqli_error($db));

    while ($rows = mysqli_fetch_array($query2)) {
        //$xname = $rows['username'];
       // $xid = $rows['userID'];

        $bugID= $row['bugID'];
        $userID= $_SESSION['userID'];
        echo "The userID of the person who posted the comment = $userID<br>";
        echo "The bugID is = $bugID<br>";
    }

    $sql = mysqli_query ($db, "INSERT INTO comments (comment, postDate, userID, bugID) VALUES ('$comment', now(), '$userID', '$bugID')") or die(mysqli_error($db));


    //$query=mysqli_query($db,"INSERT INTO bugs, attachments (title, desc, postDate, fixDate, fixed) (URL) VALUES ('$title','$desc','$postDate','$fixDate','$fixed') ('$bugattachmentURL')");
    //$sql = "INSERT INTO bugs". " (title, descr, postDate, fixDate, fixed, userID)" . " VALUES ('$title','$descr','$postDate','$fixDate','$fixed', '$userID')";
    // $query=mysqli_query($sql,$db);

    // $getBugID=mysqli_insert_id ($db); //get bugID for the new bug

    // $query2=mysqli_query($db,"INSERT INTO attachments ( URL ) VALUES ('$bugfile')"

    //}


    if ($sql) //(mysqli_query($db,$sql))
    {
        echo "<h4>" . "Thank You! you have successfully posted a commment." . "<h3>";
    }

    else{
        echo "<h4>". "Unsuccessful...Please try again" . "</h4>";

    }

    ?>
</div>