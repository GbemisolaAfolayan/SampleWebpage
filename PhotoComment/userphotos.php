<?php
$resultText = "";
if(isset($_SESSION['username']))
{
    $name = $_SESSION["username"];
    $resultText1 = "no photos by you!";
    $resultText2 = "no user with that username";

    $sql="SELECT userID FROM users WHERE username='$name'";
    $result=mysqli_query($db,$sql);
    $row=mysqli_fetch_assoc($result);
    if(mysqli_num_rows($result) == 1)
    {
        $searchID = $row['userID'];
        $searchSql="SELECT title, photoID,url FROM photos WHERE userID='$searchID'";
        $searchresult=mysqli_query($db,$searchSql);

        if(mysqli_num_rows($searchresult)>0){
            while($searchRow = mysqli_fetch_assoc($searchresult)){
                $line = "<p><img src='".$searchRow['url']."' style='width:100px;height:100px;'><a href='photo.php?id=".$searchRow['photoID']."'>".$searchRow['title']."</a></p>";
                $resultText = $resultText.$line;
            }
        }
        else{
            /*xss safe echo
            function xecho ($resultText1) {
                echo xssafe ($resultText1);
            }*/
            $resultText = "no photos by you!";
        }
    }
    else
    {
        /*xss safe echo
        function xecho ($resultText2)
        {
            echo xssafe($resultText2);
        }*/
            $resultText = "no user with that username";

    }
}
?>