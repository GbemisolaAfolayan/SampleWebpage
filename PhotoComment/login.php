<?php
	session_start();
    session_regenerate_id();
	include("connection.php"); //Establishing connection with our database
  //  include('check.php'); // Include session & timeout
    $error = ""; //Variable for storing our errors.
	if(isset($_POST["submit"])) {
        //Check Anti-CRSF token
       // checkToken($_REQUEST['user_token'], $_SESSION['session_token'], 'index.php');
        if (empty($_POST["username"]) || empty($_POST["password"])) {
            $error = "Both fields are required.";
        } else {
            // Define $username and $password
            $username = $_POST['username'];
            $password = $_POST['password'];

            $error = "Incorrect username or password.";
            $success = "success";

            //prevents xss
            $username = htmlspecialchars($_POST['username']);
            $username =xss_erase($username);
            $password = htmlspecialchars($_POST['password']);

            //escape function
            $username = stripslashes($username);
            $password = stripslashes($password);
            $username = mysqli_real_escape_string($db, $username);
            $password = mysqli_real_escape_string($db, $password);
            $password = md5($password);

            //prepare
            /* Prepare statement, stage 1: prepare and Check username and password from database
            //if (!
            //$stmt = $mysqli->prepare("SELECT userID FROM users WHERE username =:username  AND password =:password ");
            $stmt = $mysqli->prepare("SELECT userID FROM users WHERE username = ?  AND password = ? ");
            $stmt->bind_param('ss', $username, $password);
            $stmt->execute();
            //$stmt->bind_result($username, $password);
            $row = $stmt->fetch();
            if ($stmt->rowcount() == 1) {
                function xecho($success)
                {
                    echo xssafe($success);
                }
                $_SESSION['username'] = $username;// Initializing Session
               // $_SESSION['start'] = time(); // Taking now logged in time.
                // Ending a session in 10 minutes from the starting time.
                //$_SESSION['expire'] = $_SESSION['start'] + (2 * 60);
                header("location: photos.php"); // Redirecting To Other Page
            } else {
                function xecho($error)
                {
                    echo xssafe($error);
                }

            */
            //Check username and password from database
            $sql = "SELECT userID FROM users WHERE username='$username' and password='$password'";
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

            //If username and password exist in our database then create a session.
            //Otherwise echo error.

            if (mysqli_num_rows($result) == 1) {

                function xecho($success)
                {
                    echo xssafe($success);
                }

                $_SESSION['username'] = $username;// Initializing Session
                $_SESSION['userid'] = $userid;
                $_SESSION['IP'] = $_SERVER['REMOTE_ADDR'];
                /*$_SESSION['start'] = time(); // Taking now logged in time.
                // Ending a session in 10 minutes from the starting time.
                //$_SESSION['expire'] = $_SESSION['start'] + (10 * 60); */
                header("location: photos.php"); // Redirecting To Other Page
            } else
            { //xss safe output - sanitizing output
                function xecho($error)
                {
                    echo xss_erase($error);


                }

            }



        }
    }


?>