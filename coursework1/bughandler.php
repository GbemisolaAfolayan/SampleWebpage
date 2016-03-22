<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign up redirect</title>
    <link rel="stylesheet" href="bug.css" type="text/css" />
</head>
<body>

<?php

include("connection.php");
include("check.php");

/*if(isset($_POST["submit"]))
{
*/
$title=$_POST["title"];
$desc=$_POST["desc"];
$postDate=$_POST["postDate"];
$fixDate=$_POST["fixDate"];
$fixed=$_POST["bugstatus"];
//$bugfile=$_POST["bugfile"];



//{

//strip special characters
$title= mysqli_real_escape_string($db,$title);
$desc= mysqli_real_escape_string($db,$desc);
$postDate= mysqli_real_escape_string($db,$postDate);
$fixDate= mysqli_real_escape_string($db,$fixDate);
$fixed=mysqli_real_escape_string($db,$fixed);

//$sql="SELECT email FROM users WHERE email='$email'";

//set a query to see if the entered email matches any email in the database

/*$result=mysqli_query($db,$sql);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
//}
if(mysqli_num_rows($result)==1) {
    echo "Sorry...This email already exists...";
}

else{
*/

    $query=mysqli_query($db,"INSERT INTO bugs(title, desc, postDate, fixDate, fixed) VALUES ('$title','$desc','$postDate','$fixDate','$fixed')");

    //$query2=mysqli_query($db,"INSERT INTO comments (desc, postDate) VALUES ('$comment','$postDate')");

//}

if($query) ($query2);
{
    echo "<h3>" . "Thank You! you have successfully registered a bug." . "<h3>";
}


?>

</body>
</html>