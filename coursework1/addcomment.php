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
    //include("connection.php");
   // include("bug.php");

   //if(isset($_POST["submit"]));

    $comment =$_POST["comment"];
    $postDate = date('d/m/y');
    $userID=$_SESSION['userID'];
    $bugID= $_GET["bugID"];
   // $userID =$_POST["userID"];
    //$bugID =$_POST["bugID"];

   // $query =  mysqli_query($db,"INSERT INTO comments (desc, postDate, userID, bugID) VALUES ('$desc', '$postDate', '$userID', '$bugID')");
    $query =  mysqli_query($db,"INSERT INTO comments (comment, postDate, userID, bugID ) VALUES ('$comment', '$postDate', '$userID', '$bugID')");

    if ($query)
    {
        echo "Comments added successfully";
      //  header("location:buglist.php"); // Redirecting To another Page
    }
    else {
        echo "Unsuccessful...Please try again.";
    }


    //select everything from the bug table where the ID is right
   // $sql="SELECT *FROM bugs WHERE bugs.ID=".$_GET["id"];
   // $sql="INSERT INTO comments (desc, postDate, userID, bugID) VALUES ("");

    //fetch result from the database
    //$result=mysqli_query($db,$sql);
    //scan thru each row in the response
   // $row = mysqli_fetch_assoc($result);

    //get the title and ID from the bug
   // $bugTitle =$row['title'];
   // $bugID =$row['bugID'];
    //$bugDesc =$row['desc'];


    ?>
</div>