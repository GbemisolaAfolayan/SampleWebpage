<?php
session_start();
include ("check.php");
include ("connection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome - Bug List</title>
    <link rel="stylesheet" href="bug.css" type="text/css" />
</head>
<body>

<div id=buglistcontent>
    <header>
        <h1 style="font-family: 'Bradley Hand ITC'"><b>Bugs List</b></h1>

        <nav>
            <ul>
                <li><a href="bughome.php">Report New Bug</a></li>
                <li style="float:right"><a href="logout.php" >Logout</a></li>

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
           echo "<br><li><a href=bug.php?bugID=$bugID >$bugTitle </a></li>";

        }
    ?>

    <footer>
        <p>(c) 2016 1515251_CMM503 Web Design</p>
    </footer>


    </div>



</div>
</body>
</html>
