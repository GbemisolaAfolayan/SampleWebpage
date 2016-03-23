
<?php
    include ("connection.php");
    include ("submit.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> BUG TRACKING SYSTEM - Sign Up </title>
    <link type="text/css" rel="stylesheet" href="bug.css"/>
</head>
<body>
<h1> BUG TRACKING SYSTEM </h1>
<h3> Sign Up </h3>
<form method="post" action="">
   <div id="signupbox">
       <fieldset>
        <legend>Register</legend>
        <table width="400" border="0" cellpadding="10" cellspacing="10">
               <tr>
                   <td colspan="2" align="center" class="error"><?php echo $msg;?></td>
               </tr>>
            <tr>
                <td> <label for="username">Username:</label> </td>
                <td> <input type="text" name="username" value="" required/> </td>
            </tr>
            <tr>
                <td> <label for="email">Email:</label> </td>
                <td> <input type="email" name="email" value="" required/> </td>
            </tr>
            <tr>
                <td> <label for="phone"> Phone Extention:</label> </td>
                <td> <input type="text" name="phone" value="" required/> </td>
            </tr>
            <tr>
                <td> <label for="password">Password</label> </td>
                <td> <input type="password" name="password" value=""required> </td>

            </tr>

            <td>
                <div align="right">
                    <input type="submit" name="submit" value="Register!" />
                </div>
            </td>


        </table>

    </fieldset>

       <a href="index.php" style="font-size:18px">Login </a>

       </div>
</form>

</body>


</html>