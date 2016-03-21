<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bug List</title>
    <link rel="stylesheet" href="bug.css" type="text/css" />
</head>
<body>
    <div id="content">
    <h3> Hello". " ". $_GET["username"]."</h3>"</h3>

    <h2><b>Bug List</b></h2>
    <p> <p style="text-align: justify";> <i> <b>Click on the Bugs to view description </b></i></p>


        <?php
        include("connection.php");

        echo"<h3> Hello". " ". $_GET["username"]."</h3>";


        //select everything from our bug table
        $sql="SELECT * FROM bugs";

        //fetch result from the database
        $result=mysqli_query($db,$sql);
        //scan through each row in the response
        while($row=mysqli_fetch_assoc($result)){
            //get title and id from the bug
            $bugTitle=$row['title'];
            $bugID=$row['bugID'];
            echo $bugID;

            //write the link to the page
           //header("location: bug.php?bugID=" . $bugID); // Redirecting To another Page
           echo '<a href="bug.php?bugID="'. $bugID.'>'.$bugTitle.'</a></br>';
            header("location: bug.php?bugID=" . $bugID); // Redirecting To another Page
           // echo '<a href="bug.php?bugID="'. $bugID.'>'.$bugTitle.'</a></br>';

        }
    ?>
        </div>
    <div id="Newbug">

        <p> New Bug? <a href ="bughome.php"> Report A Bug! </a> </p>

    </div>



</body>
</html>
