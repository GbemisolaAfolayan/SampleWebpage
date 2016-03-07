<?php
include("connection.php");


$sql ="SELECT * FROM gbemi";
$result = mysqli_query($db, $sql);

if (mysqli_num_rows($result) > 0) {

    // output data of each row
    while($sql = mysqli_fetch_assoc($result)) {
        echo  " ID: " . $result[0]. "<br>";
    }
} else {
    echo "0 results";
}
?>