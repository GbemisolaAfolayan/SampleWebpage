<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Register Bug </title>
    <link rel="stylesheet" href="bug.css" type="text/css" />
</head>
<body>

<?php
session_start();
include("connection.php");
include("check.php");


//include("check.php");
//session_start();

/*if(isset($_POST["submit"]))
{
*/
$title=$_POST["title"];
$desc=$_POST["desc"];
$postDate=$_POST[""];
$fixDate=$_POST[""];
$fixed=0;
$userID=$_SESSION['userID'];
//$bugfile=$_POST["file"];

//{

//strip special characters

$title= mysqli_real_escape_string($db,$title);
$desc= mysqli_real_escape_string($db,$desc);
$postDate= mysqli_real_escape_string($db,$postDate);
$fixDate= mysqli_real_escape_string($db,$fixDate);
$fixed=mysqli_real_escape_string($db,$fixed);
//$bugfile=mysqli_real_escape_string($db,$bugfile);

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

//$bugattachmentURL= addslashes($bugattachmentURL);
    echo $desc;
//if (empty($_POST["file"])
//{
  //  $query=mysqli_query($db,"INSERT INTO bugs (title, desc, postDate, fixDate, fixed) VALUES ('$title','$desc','$postDate','$fixDate','$fixed')");
//}
//else

    //$query=mysqli_query($db,"INSERT INTO bugs, attachments (title, desc, postDate, fixDate, fixed) (URL) VALUES ('$title','$desc','$postDate','$fixDate','$fixed') ('$bugattachmentURL')");
    $query=mysqli_query($db,"INSERT INTO bugs (title, desc, postDate, fixDate, fixed, userID) VALUES ('$title','$desc','$postDate','$fixDate','$fixed', '$userID')");

   // $getBugID=mysqli_insert_id ($db); //get bugID for the new bug

  // $query2=mysqli_query($db,"INSERT INTO attachments ( URL ) VALUES ('$bugfile')"

//}


if($query)
{
    echo "<h4>" . "Thank You! you have successfully registered a bug." . "<h3>";
}

else{
    echo "<h4>". "Bug Registration Unsuccessful" . "</h4>";

}

?>

</body>
</html>