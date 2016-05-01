<?php
session_start();
include("connection.php"); //Establishing connection with our database
//include('check.php'); // Include session & timeout

//xss safe output - sanitizing output
function xecho($msg){echo xssafe($msg);}

$msg = ""; //Variable for storing our errors.
if(isset($_POST["submit"])) {
    $title = $_POST["title"];
    $desc = $_POST["desc"];
    $url = "test";
    $name = $_SESSION["username"];

    //escapes & strip special characters against SQL injection
       $title = mysqli_real_escape_string($db, $title);
    $desc = mysqli_real_escape_string($db, $desc);

    // prevents xss
    $title = htmlspecialchars($_POST["title"]);
    $desc = htmlspecialchars($_POST["desc"]);
    $title = stripslashes($title);
    $desc = stripslashes($desc);

    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
    $uploadOk = 1;
    // $file_exist= file_exists($target_file);
    //$imagesize = getimagesize($_FILES["fileToUpload"]["name"]);

    $check=getimagesize($_FILES ["fileToUpload"]["tmp_name"]); //checks if file is an image
    if ($check !== false) {
        echo "File is an image - " . $check["mime"]. ".";
        $uploadOk=1;

        if (file_exists($target_file))  //checks if file already exists
        {
            $msg= "Sorry, file already exist.";
        }else {
            if ($_FILES["fileToUpload"]["size"] > 100000) //checks if file size is greater than 100kb
                {
                $msg= "Sorry, your picture is too large. File should be 100kb or less!";
                } else {
                    //checks if file s the acceptable format
                    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") { //function xecho($imageNOK){echo xssafe($imageNOK);}
                    $msg = "Sorry, only JPG, PNG, JPEG and GIF files are allowed";
                    $uploadOk = 0;
                    } else {
                    //do the upload
                    $sql = "SELECT userID FROM users WHERE username='$name'";
                    $result = mysqli_query($db, $sql);
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                    if (mysqli_num_rows($result) == 1) {
                        //$timestamp = time();
                        //$target_file = $target_file.$timestamp;
                        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                            $id = $row['userID'];
                            $addsql = "INSERT INTO photos (title, description, postDate, url, userID) VALUES ('$title','$desc',now(),'$target_file','$id')";
                            $query = mysqli_query($db, $addsql) or die(mysqli_error($db));
                            if ($query) {
                                $msg = "Thank You! The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded. click <a href='photos.php'>here</a> to go back";
                            } else {
                                $msg = "Sorry, there was an error uploading your file.";
                            }

                        }
                        else {
                            $msg = "You need to login first";
                        }
                    }
                }



            }

        }


    }else {
        $msg = "File is not an image. ";
    }


        /*
    //specfy the accepted files and reports and error message if another file type is uploaded.
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") { //function xecho($imageNOK){echo xssafe($imageNOK);}
            $msg = "Sorry, only JPG, PNG, JPEG and GIF files are allowed";
            $uploadOk = 0;
                } else {
                //do the upload
                    $sql = "SELECT userID FROM users WHERE username='$name'";
                     $result = mysqli_query($db, $sql);
                         $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                    if (mysqli_num_rows($result) == 1) {
                     //$timestamp = time();
                     //$target_file = $target_file.$timestamp;
                    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    $id = $row['userID'];
                     $addsql = "INSERT INTO photos (title, description, postDate, url, userID) VALUES ('$title','$desc',now(),'$target_file','$id')";
                     $query = mysqli_query($db, $addsql) or die(mysqli_error($db));
                             if ($query) {
                             $msg = "Thank You! The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded. click <a href='photos.php'>here</a> to go back";
                            } else {
                             $msg = "Sorry, there was an error uploading your file.";
                                }
                //echo $name." ".$email." ".$password;


                     } /* if ($uploadOk == 0) {

        echo "Sorry, your file was not uploaded.";

        function xecho($imageNotUploaded)
        {
            echo xssafe($imageNotUploaded);
        }


                     else {
                        $msg = "You need to login first";
                            }
                    }
    }*/

}
?>