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
include("buglist.php");


$title=$_POST["title"];
$descr=$_POST["descr"];

$user=$_SESSION['username'];
$file_name=$_POST["file"];

echo $file_name;
//{

//strip special characters

$title= mysqli_real_escape_string($db,$title);
$desc= mysqli_real_escape_string($db,$desc);
$file_name= mysqli_real_escape_string($db,$file_name);


//queries the users table where the user is the logged-in user for username and userID
$query2 = mysqli_query($db, "SELECT * FROM users WHERE username = '$user'") or die (mysqli_error($db));

//fetch result from the database
while ($rows = mysqli_fetch_array($query2)) {
    $xname = $rows['username'];
    $xid = $rows['userID'];
    echo "The username selected is = $xname<br>";
    echo "The userID is = $xid<br>";
}

$file_name = $_FILES['image']['name'];
$dir = $_FILES['image']['tmp_name'];
$location = "uploads/";
$fp = fopen($dir, 'r');
$content = fread($fp, filesize($dir));
$content = addslashes($content);
fclose($fp);
move_uploaded_file($dir, $location.$file_name);

//inserts the new bug details into the bugs table
$sql = mysqli_query ($db, "INSERT INTO bugs (title, descr, postDate, userID) VALUES ('$title', '$descr', now(), '$xid')") or die(mysqli_error($db));


//queries the bugs table where the title is the new bug title to get the bugID
$sql1 = mysqli_query($db, "select * from bugs where title = '$Bugtitle'");

while ($runsql = mysqli_fetch_array($sql1)) {
    $newbugid = $runsql ['bugID'];
}

//inserts the new bug attachment into attachments table using the bugID
$query1 = mysqli_query($db, "insert into attachments (URL, userID, bugID) VALUES ('$content', '$xid', '$newbugid')");
//$result = mysqli_query($query1);
if($query1) {
    echo "<br/>Image Uploaded.";
}
else
{
    echo "<br/>Image Not Uploaded.";
}


if ($sql) //(mysqli_query($db,$sql))
{
    echo "<h4>" . "Thank You! you have successfully registered a bug." . "<h3>";
}

else{
    echo "<h4>". "Bug Registration Unsuccessful" . "</h4>";

}


?>

</body>
</html>