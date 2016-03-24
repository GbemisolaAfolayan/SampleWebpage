<?php
session_start();
include("connection.php");
include("check.php");
include("buglist.php");

?>

<html>
<head>  </head>

<body>
<div id="content">
    <?php
    //include("connection.php");
   // include("bug.php");
/*
   if(isset($_POST["submit"]));

    $comment =$_POST["comment"];
    $postDate = date('d/m/y');
    $userID=$_SESSION['userID'];
    $bugID= $_SESSION["bugID"];
   // $userID =$_POST["userID"];
    //$bugID =$_POST["bugID"];
    echo $comment;
    echo $postDate;
    echo $userID;
    echo $bugID;
   // $query =  mysqli_query($db,"INSERT INTO comments (desc, postDate, userID, bugID) VALUES ('$desc', '$postDate', '$userID', '$bugID')");
    $query =  mysqli_query($db,"INSERT INTO comments VALUES ('','$comment', '$postDate', '$userID', '$bugID')");

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
*/

    $comment=$_POST["comment"];
    $user=$_SESSION['username'];
   // $descr=$_POST["descr"];
    //$postDate=$_POST["postDate"];
    //$fixDate='';
    //$fixed=0;
    $userID=$_SESSION['userID'];
    //$bugID=$_GET['bugID'];
    $bugID=$_POST['bugID'];
    //$bugfile=$_POST["file"];

    //{

    //strip special characters
    //echo date('d/m/y');
    $comment= mysqli_real_escape_string($db,$comment);
   /* $desc= mysqli_real_escape_string($db,$desc);
    $postDate= mysqli_real_escape_string($db,$postDate);
    $fixDate= mysqli_real_escape_string($db,$fixDate);
    $fixed=mysqli_real_escape_string($db,$fixed);
    //$bugfile=mysqli_real_escape_string($db,$bugfile);
*/
    //$sql="SELECT email FROM users WHERE email='$email'";

    //set a query to see if the entered email matches any email in the database

    /*$result=mysqli_query($db,$sql);
    $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
    //}
    if(mysqli_num_rows($result)==1) {
        echo "Sorry...This email already exists...";
    }

    else{
    */

    //$bugattachmentURL= addslashes($bugattachmentURL);
    // echo $descr;
    //  echo $title;
    //echo $postDate;
    //echo $fixDate;
    //echo $fixed;
    //echo $userID;
    //echo $user;
    echo $bugID;

    //if (empty($_POST["file"])
    //{
    //  $query=mysqli_query($db,"INSERT INTO bugs (title, desc, postDate, fixDate, fixed) VALUES ('$title','$desc','$postDate','$fixDate','$fixed')");
    //}
    //else
    $query2 = mysqli_query($db, "SELECT * FROM bugs WHERE bugID = '$bugID'") or die (mysqli_error($db));

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
    echo $userID;
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