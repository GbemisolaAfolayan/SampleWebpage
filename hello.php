<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>HelloWorld</title>
</head>
<body>
<p>
    <?php   echo "Hello World";
            echo "<br>";
            echo 5*7;
            echo "<br>";
            echo "Hello," . " " . " world" . "!";
            echo "<br>";
            $myname = "Gbemisola Afolayan";
            $myage = "111";
            echo "My  name is " .$myname. " and I am ".$myage." years old";

    ?>


</p>

<p>
    <?php
        $name = "Edgar";
        if ($name == "Simon") {print "I know you!";}
        else {print "Who are you?";}
    ?>
</p>
<p>
    <?php
    $myage = "16";
    $myage = "18";
    $myage = "21";
    if ($myage < "16") {print "Yor are Underage! Thanks!";}
    if ($myage == "16") {print "You can have specs";
    if ($myage == "18") {print "You can have specs or mugs";}
    if ($myage >= "21") {print "You can have specs, mugs or sausage rolls";}
    else {print "Who old are you?";}


    ?>
</p>







</body>


</html>