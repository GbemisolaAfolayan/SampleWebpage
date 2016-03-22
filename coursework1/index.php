<?php
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> BUG TRACKING SYSTEM - Login </title>
    <link type="text/css" rel="stylesheet" href="bug.css"/>
</head>
<body>
<h1> BUG TRACKING SYSTEM </h1>
<form method="post" action="login.php">
<div id="loginbox">
    <fieldset>
        <legend>Login</legend>
        <table>
            <tr>
                <td> <label for="username">Username:</label><br></td>
                <td> <input type="text" name="username" value="" /><br> </td>
            </tr>


            <tr>
                <td> <label for="password">Password:</label><br> </td>
                <td> <input type="password" name="password" value=""> </td>

            </tr>
            <div id="submitbutton">
            <tr>
                <td> <input type="submit" value="Login"> </td>
            </tr>
            </div>

        </table>
    </fieldset>
</div>

</form>
<div id="signup">

    <p> New User ? <a href ="signup.php"> Sign Up Here </a> </p>
</div>


</body>


</html>



