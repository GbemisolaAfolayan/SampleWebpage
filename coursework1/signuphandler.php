<html>
<head>
    <title>    </title>

</head>
<body>

<?php

include("connection.php");

if(isset($_POST["submit"]))
{
    $name=$_POST["username"];
    $email=$_POST["email"];
    $phone=$_POST["phone"];
    $password=$_POST["password"];

    //strip special characters
    $name= mysqli_real_escape_string($db,$name);
    $email= mysqli_real_escape_string($db,$email);
    $phone= mysqli_real_escape_string($db,$phone);
    $password= mysqli_real_escape_string($db,$password);
    $password=md5($password);

    $sql="SELECT email FROM users WHERE email='$email'";

    //set a query to see if the entered email matches any email in the database
    $result=mysqli_query($db,$sql);
    $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
}
if(mysqli_num_rows($result)==1) {
    echo "Sorry...This email already exists...";
}

else{
    $query=mysqli_query($db,"INSERT INTO users(username, email, phone, password) VALUES ('$name','$email','$phone','$password')");

}
if($query)
{
    echo "Thank You! you are now registered.";
}


?>





</body>

</html>
