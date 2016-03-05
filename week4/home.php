<html>
<head>
    <meta charset="utf-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="style.css" type="text/css" />
</head>

<body>
<?php
include("connection.php");
echo"<h1> Hello". " ". $_GET["username"]."</h1>";

$id=$_POST['uid'];
$username=$_POST['username'];
$password=$_POST['password'];

$sql ="SELECT uid, username, password FROM gbemisola_1515251";
$result = mysqli_query($db, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($sql = mysqli_fetch_assoc($result)) {
        echo  " ID: " . $id["uid"]. "Name: " . $username["username"] . "Password: " .  $password ["password" ]. "<br>";
    }
} else {
    echo "0 results";
}

?>

</body>
</html>

