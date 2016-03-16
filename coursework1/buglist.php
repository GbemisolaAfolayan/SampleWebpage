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

        $sql="SELECT * FROM bugs";

        $result=mysqli_query($db,$sql);
        while($row=mysqli_fetch_assoc($result)){
            $bugTitle=$row['title'];
            $bugID=$row['ID'];

            echo '<a href="bug.php?id="'. $bugID.'>'.$bugTitle.'</a></br>';
        }
    ?>
        </div>



</body>
</html>
