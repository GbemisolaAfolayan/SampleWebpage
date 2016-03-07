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

$username = $_GET["username"];
$sql ="SELECT * FROM 'users'";
$result = mysqli_query($db, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($sql = mysqli_fetch_assoc($result)) {
        echo  " ID: " . $result["uid"]. "Name: " . $result["username"] . "Password: " .  $result["password" ]. "<br>";
    }
} else {
    echo "0 results";
}

?>

</body>
</html>

