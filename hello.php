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
    $myage = 25;

    if ($myage < 16) {print "Yor are Underage! Thanks!";}
    elseif ($myage < 18) {print "You can have specs";}
    elseif ($myage < 21) {print "You can have specs and mugs";}
    elseif ($myage >= 21) {print "You can have specs, mugs or sausage rolls";}
    else {print "How old are you?";}

    ?>
</p>
<p>
    <?php
    $myage = 7;

    if ($myage >= 21) {echo "You can have specs, mugs or sausage rolls";}
    elseif ($myage >=18) {print "You can have specs and mugs";}
    elseif ($myage >=16) {print "You can have specs";}

    else {print "You cant buy anything";}

    ?>
</p>







</body>


</html>