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
                <td><textarea name="desc" cols="40“ rows="2 required> </textarea></td>

            </tr>
            <tr>
                <td> <label for="postDate"> Date Posted:</label> </td>
                <td> <input type="date" name="postDate" placeholder="dd/mm/yyyy" required /> </td>
            </tr>
            <tr>
                <td> <label for="bugstatus">Bug Status:</label> </td>
                <td> <select name="bugstatus" required>
                    <option value="">Select BugStatus</option>
                    <option value="fixed">Fixed</option>
                    <option value="unfixed">Unfixed</option>
                </select> </td>
            </tr>
            <tr>
                <td> <label for="fixDate"> Date Fixed:</label> </td>
                <td> <input type="date" name=fixDate" value="dd/mm/yyyy" /> </td>
            </tr>

            <tr>
                <td> <label for="URL"> Bug Attachment URL:</label> </td>
                <td> <input type="url" name="URL" value="" required /> </td>
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