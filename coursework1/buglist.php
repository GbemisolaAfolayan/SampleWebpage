<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bug List</title>
</head>
<body>
    <h1> Bug List</h1>
    <div id="content">
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
            $bugID=$row['ID'];

            //write the link to the page
            echo '<a href="bug.php?id="'. $bugID.'>'.$bugTitle.'</a></br>';
        }
    ?>
        </div>
    <div id="Newbug">

        <p> New Bug ? <a href ="bughome.php"> Report A Bug! </a> </p>

    </div>



</body>
</html>
