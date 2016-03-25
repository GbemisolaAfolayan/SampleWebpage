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

//include("check.php");
//session_start();

/*if(isset($_POST["submit"]))
{
*/
$title=$_POST["title"];
$descr=$_POST["descr"];
//$postDate=$_POST["postDate"];
//$fixDate='';
//$fixed=0;
//$userID=$_SESSION['userID'];

$user=$_SESSION['username'];
$file_name=$_POST["file"];

echo $file_name;
//{

//strip special characters
//echo date('d/m/y');
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
   // echo $descr;
  //  echo $title;
//echo $postDate;
//echo $fixDate;
//echo $fixed;
//echo $userID;
//echo $user;

//if (empty($_POST["file"])
//{
  //  $query=mysqli_query($db,"INSERT INTO bugs (title, desc, postDate, fixDate, fixed) VALUES ('$title','$desc','$postDate','$fixDate','$fixed')");
//}
//else

$query2 = mysqli_query($db, "SELECT * FROM users WHERE username = '$user'") or die (mysqli_error($db));

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

$sql = mysqli_query ($db, "INSERT INTO bugs (title, descr, postDate, userID) VALUES ('$title', '$descr', now(), '$xid')") or die(mysqli_error($db));



$sql1 = mysqli_query($db, "select * from bugs where title = '$Bugtitle'");

while ($runsql = mysqli_fetch_array($sql1)) {
    $newbugid = $runsql ['bugID'];
}


$query1 = mysqli_query($db, "insert into attachments (URL, userID, bugID) VALUES ('$content', '$xid', '$newbugid')");
//$result = mysqli_query($query1);
if($query1) {
    echo "<br/>Image Uploaded.";
}
else
{
    echo "<br/>Image Not Uploaded.";
}
    //$query=mysqli_query($db,"INSERT INTO bugs, attachments (title, desc, postDate, fixDate, fixed) (URL) VALUES ('$title','$desc','$postDate','$fixDate','$fixed') ('$bugattachmentURL')");
//$sql = "INSERT INTO bugs". " (title, descr, postDate, fixDate, fixed, userID)" . " VALUES ('$title','$descr','$postDate','$fixDate','$fixed', '$userID')";
   // $query=mysqli_query($sql,$db);

   // $getBugID=mysqli_insert_id ($db); //get bugID for the new bug

  // $query2=mysqli_query($db,"INSERT INTO attachments ( URL ) VALUES ('$bugfile')"
echo $userID;
//}


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