<?php
session_start();
include("check.php");
?>

<html>
<head>

    <link rel="stylesheet" href="bug.css" type="text/css" />
</head>

<body>
<div id="contentbug">

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

    //displays the bug description, post date and fix date
    echo "<p>"."<b>".$bugTitle."</b>";
    echo "</br> Bug Description:".$bugDesc."</p>";
    echo "<p>Post Date:".$postDate."</br>";
    echo "Fix Date:".$fixDate."</p>";

    //To display the comments on that bug, and the user that posted the comment
    $bugID= $_GET["bugID"];

    //select everything from our bugs where the ID is right
    $sql2="SELECT * FROM comments WHERE bugID=".$_GET["bugID"];

    //fetch results from the database
    $result2=mysqli_query($db,$sql2);
    //we can scan through each row in the response
   while ($row2=mysqli_fetch_array(MYSQLI_ASSOC, $result2));{
        //get the title and id from the bug
        //$commentTitle = $row['title'];
        $comment = $row2['comment'];
        $postDate=$row2['postDate'];
        $userID=$row2['userID'];

    //displays the bug comment, post date and user that posted the comment
        echo '<br>'."Comments: ".$comment.' ';
        echo '<br>'. "PostDate: ". $postDate. ' ' ;
        echo '<br>'. "Posted by User" . $userID. ' ';

    }

    ?>


<div id="Comment">
    <h4 style="color: blueviolet"> Comment on this bug</h4>
    <form action="addcomment.php?bugID=<?php echo $_GET['bugID'];?>"  method="POST">

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

    <div id="buglist">
        <p> <a href="buglist.php"> Back to Bugs List</a></p>

    </div>

    <footer>
        <p>(c) 2016 1515251_CMM503 Web Design</p>
    </footer>
</div>
</body>
</html>
