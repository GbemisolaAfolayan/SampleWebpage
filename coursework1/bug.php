<html>
<head>  </head>

<body>
<div id="content">
    <?php
    include("connection.php");

    //select everything from the bug table where the ID is right
    $sql="SELECT *FROM bugs WHERE bugs.ID=".$_GET["id"];

    //fetch result from the database
    $result=mysqli_query($db,$sql);
    //scan thru each row in the response
    $row = mysqli_fetch_assoc($result);

    //get the title and ID from the bug
    $bugTitle =$row['title'];
    $bugID =$row['bugID'];
    $bugDesc =$row['desc'];

    echo "<h2>".$bugTitle."</h2>";
    echo "<p>".$bugDesc."</p>";

    ?>
</div>
     //after viewing the bug  description, you can add a comment if you want.
<div id="Comment">
    <h3> Comment on this bug</h3>
    <form method="post" action="addcomment.php">

    <tr>
        <td><label for="comment">Comment: </label> </td>
        <td> <textarea name="comment" rows="5" cols="40"></textarea> </td>
    </tr>
</div>
<div id="submitbutton">
    <tr>
        <td> <input type="submit" value="Submit"> </td>
    </tr>
</div>
    </form>


</body>
</html>
