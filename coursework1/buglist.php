<?php
session_start();
include ("check.php");
include ("connection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bug List</title>
    <link rel="stylesheet" href="bug.css" type="text/css" />
</head>
<body>

<div id=buglistcontent>
    <header>
        <h1 style="font-family: 'Bradley Hand ITC'"><b>Bug List</b></h1>

        <nav>
            <ul>
                <li><a href="href ="bughome.php">Report New Bug</a></li>
                <li><a href="logout.php" >Logout</a></li>

            </ul>
        </nav>
    </header>

<div id="content">
    <h2 class="hello">Hello, <em><?php echo $login_user;?>!</em></h2>

    <i style="font-size: small"> Click on the Bugs to view description </i>
    <br>

    <?php
    include("connection.php");
    include("check.php");
    session_start();



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
           echo "<ul><li><a href=bug.php?bugID=$bugID >$bugTitle </a></br>";

        }
    ?>




    </div>



</div>
</body>
</html>
