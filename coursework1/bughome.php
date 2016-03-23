<?php
include("connection.php");
//include("check.php");
//session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>BUG TRACKING SYSTEM - Home (Welcome)</title>
    <link type="text/css" rel="stylesheet" href="bug.css"/>
</head>
<body>
<h1> BUG TRACKING SYSTEM </h1>
<h3> Report New Bugs Here </h3>
<form method="post" action="bughandler.php">
<div id="BugInformation">
    <fieldset>

        <table>
            <tr>
                <td> <label for="title">Bug Title:</label> </td>
                <td> <input type="text" name="title" value="" required /> </td>
            </tr>
            <tr>
                <td> <label for="desc">Bug Description:</label> </td><br>
                <td><textarea name="desc" cols="40“ rows="4 required> </textarea></td>

            </tr>
            <tr>
                <td> <label for="postDate"> Date Posted:</label> </td>
                <td> <input type="date" name="postDate" value="<?php echo date(d/m/y);?>" readonly /> </td>
            </tr>

            <tr>
                <td> <label for="file"> Bug Attachment URL:</label> </td>
                <td> <input type="file" name="file" value="" required /> </td>
            </tr>


            <div id="submitbutton">
            <tr>
                <td> <input type="submit" value="Submit"> </td>
            </tr>
            </div>

        </table>

    </fieldset>


</div>
    </form>

</body>
</html>