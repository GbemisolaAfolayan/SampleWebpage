<?php
//session_start();
/*
if(!$_SESSION['protect']){$_SESSION['protect']=0;}
if($_SESSION['protect']>3){

    die ('Please enter valid credentials');
    echo "Please enter valid credentials";

}
if(isset($_REQUEST['checkpass']))
{
    $_SESSION['protect']++;
    $password=md5($_REQUEST['password']);
    $username=$_REQUEST['username'];
    if($password=="e10adc3949ba59abbe56e057f20f883e")  // pass: 123456
    {
        $_SESSION['khalil']=$username; // assign session for logged user
    } // end password check
}


$login_attempt = $_SESSION['protect']++;

    // $login_trial= 3;
    // $login_attempt="";
*/

	include('login.php');// Include Login Script
   // include("check.php");
    session_start();
	if ((isset($_SESSION['username']) != '')) 
	{
		header('Location: photos.php');
	}




?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>PHP Login Form with Session</title>
<link rel="stylesheet" href="style.css" type="text/css" />
</head>

<body>
<div class="main">
<h1 style="font-family:Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', serif; font-size:32px;">Welcome to Photo Commenter</h1>
    <div class="formbox">
        <h3>Login Form</h3>
        <br><br>
        <form method="post" action="">
            <label>Username:</label><br>
            <input type="text" name="username" placeholder="username" /><br><br>
            <label>Password:</label><br>
            <input type="password" name="password" placeholder="password" />  <br><br>
            <input type="submit" name="submit" value="Login" />
        </form>
        <div class="error"><?php echo $error;?></div>
        <div class="register">You can register <a href="register.php"> here </a> </div>
    </div>

</div>
</body>
</html>