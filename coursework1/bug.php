<?php
session_start();
include("check.php");
?>

<html>
<head>

    <link rel="stylesheet" href="bug.css" type="text/css" />
</head>

<body>
<div id="content">

    <h2 style="color: blueviolet">Bug Description </h2>

    <?php
    include("connection.php");
    include("check.php");
    session_start();

    $bugID= $_GET["bugID"];
    //echo $bugID;

    //select everything from the bug table where the ID is right
   $sql="SELECT *FROM bugs WHERE bugID=".$_GET["bugID"];

    //fetch result from the database
    $result=mysqli_query($db,$sql);
    //scan thru each row in the response
    $row = mysqli_fetch_assoc($result);

    //get the title and ID from the bug
    $bugTitle =$row['title'];
    $bugID =$row['bugID'];
    $bugDesc =$row['descr'];
    $postDate=$row['postDate'];
    $fixDate=$row['fixDate'];


    echo "<p>"."<b>".$bugTitle."</b>"."</p>";
    echo "<p>Bug Description:".$bugDesc."</p>";
    echo "<p>Post Date:".$postDate."</br>";
    echo "</br>Fix Date:".$fixDate."</p>";





    //select everything from our bugs where the ID is right
    $sql="SELECT * FROM comments WHERE bugID=".$_GET["bugID"];

    //fetch results from the database
    $result=mysqli_query($db,$sql);
    //we can scan through rach row in the response
    while($row=mysqli_fetch_assoc($result) & $row2=mysqli_fetch_array($db,$sql) ){
        //get the title and id from the bug
        //$commentTitle = $row['title'];
        $comment = $row['comment'];
        $postDate=$row2['postDate'];
        $userID=$row2['userID'];
        //write the link to the page
        //echo '<h3>'.$commentTitle.'</h3>';
        echo '<br>'."Comments: ".$comment.' ';
        echo '<br>'. "PostDate: ". $postDate. ' ' ;
        echo '<br>'. "Posted by User" . $userID. ' ';
    }

    ?>


<div id="Comment">
    <h4 style="color: blueviolet"> Comment on this bug</h4>
    <form method="post" action="addcomment.php">

    <tr>
        <td><label for="comment">Comment: </label> </td>
        <td> <textarea name="comment" rows="5" cols="40"></textarea> </td>
    </tr>
</div>
<div id="submitbutton">
    <tr>
        <td> <input name="submit" type="submit" value="Submit"> </td>
    </tr>
</div>
    </form>

</div>
</body>
</html>
