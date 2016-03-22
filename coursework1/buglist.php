<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bug List</title>
    <link rel="stylesheet" href="bug.css" type="text/css" />
</head>
<body>
<?php
include("connection.php");


        echo"<h4 style='margin-left: 5%'> Hello". " ". $_GET["username"]."</h4>";
?>

<div id="content">
    <h2><b>Bug List</b></h2>
    <p> <i style="font-size: xx-small"> Click on the Bugs to view description </i></p>

    <?php
    include("connection.php");



    //select everything from our bug table
        $sql="SELECT * FROM bugs";

        //fetch result from the database
        $result=mysqli_query($db,$sql);
        //scan through each row in the response
        while($row=mysqli_fetch_assoc($result)){
            //get title and id from the bug
            $bugTitle=$row['title'];
            $bugID=$row['bugID'];
           // echo $bugID;

            //write the link to the page
            //echo '<a href="bug.php?bugID="'. $bugID.'>'.$bugTitle.'</a></br>';
            //echo '<a href="bug.php?bugID = <?= "'.$bugID['bugID']. '>' . $bugTitle. '</a></br>';
            //header("location: bug.php?bugID=" . $bugID); // Redirecting To another Page
           echo "<a href=bug.php?bugID=$bugID > $bugTitle </a></br>";

        }
    ?>

    <div id="Newbug">

        <p> New Bug? <a href ="bughome.php"> Report A Bug! </a> </p>


    </div>


    </div>



</body>
</html>
