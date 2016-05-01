<?php
session_start();

//xss safe output - sanitizing output
//function xecho($resultText){
  //  echo xss_erase($resultText);
//}

$resultText = "";
if(isset($_POST["submit"]))
{
    $name = $_POST["username"];
    $resultText1 = "no photos by you!";
    $resultText2 = "no user with that username";

    //escapes nd strip special characters
    $name = stripslashes($name);
    $name = mysqli_real_escape_string($db, $name);

    //prevents xss
    $name = htmlspecialchars($_POST["username"]);
    //$name = xss_erase($name);

    $sql="SELECT userID FROM users WHERE username='$name'";
    $result=mysqli_query($db,$sql);
    $row=mysqli_fetch_assoc($result);
    if(mysqli_num_rows($result) == 1)
    {
        $searchID = $row['userID'];
        $searchSql="SELECT title, photoID FROM photos WHERE userID='$searchID'";
        $searchresult=mysqli_query($db,$searchSql);

        if(mysqli_num_rows($searchresult)>0){
            while($searchRow = mysqli_fetch_assoc($searchresult)){
                $line = "<p><a href='photo.php?id=".$searchRow['photoID']."'>".$searchRow['title']."</a></p>";
                $resultText = $resultText.$line;
            }
        }
        else{
            $resultText = "no photos by user";
        }
    }
    else
    {
         $resultText = "no user with that username";

    }
}
?>