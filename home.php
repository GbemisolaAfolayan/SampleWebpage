<html>
<head>
    <meta charset="utf-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="style.css" type="text/css" />
</head>

<body>
<?php
include ("connection.php");
echo"<h1> Hello". " ". $_GET["username"]."</h1>";

$sql="SELECT * FROM gbemisola_1515251";

$result=mysqli_query($db,$sql);

echo $result
?>


</body>
</html>

