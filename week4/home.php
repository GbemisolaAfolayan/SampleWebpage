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

$username=$_POST['username'];
$password=$_POST['password'];

$sql ="SELECT * FROM gbemisola_1515251";
$result = mysqli_query($db, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($sql = mysqli_fetch_assoc($result)) {
        echo " Name: " . $username["username"]. " " . $password["password"]. "<br>";
    }
} else {
    echo "0 results";
}

?>

</body>
</html>

