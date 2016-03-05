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

$sql="SELECT * FROM gbemisola_1515251";

$result=mysqli_query($db,$sql);

echo $result

if (mysqli_num_rows($result) > 0) {
    echo "<table><tr><th>ID</th><th>username</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"]. "</td><td>" . $row["username"]. "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}


?>

</body>
</html>

