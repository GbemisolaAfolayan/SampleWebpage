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
    $myage = 7;

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
    elseif ($myage >=18) {echo "You can have specs and mugs";}
    elseif ($myage >=16) {echo "You can have specs";}

    else {echo "You cant buy anything";}

    ?>
</p>

<p>
    <?php
    $numberofHobbits = 3;

    switch ($numberofHobbits) {
        case 1:
            echo "1 sad hobbit";
            break;
        case 2:
            echo "2 happy hobbit";
            break;
        case 3:
            echo "3 hobbits are a crowd";
            break;
        default: "All the hobbits have gone home";
    }

    ?>
</p>
<p>
    <?php
    $wantedgoods = "mugs";

    switch($wantedgoods) {
        case "mugs":
            echo "You have to be 18 to buy mugs";
            break;
        case "specs":
            echo "You have to be 16 to buy specs";
            break;
        case "sausage roll":
            echo "You have to be 21 to buy sausage rolls";
            break;
        default:
            echo "You can't buy anything!";
            break;
    }
    ?>
</p>



<p>
    <?php
    $provisionedActivity = array("Specs", "Mugs", "Sausage Roll");
    foreach($provisionedActivity as $x) {
        print "<p>$x</p>";
    }
    $provisionedActivity[2] = "hugs";
    unset ($provisionedActivity[3]);
    echo $provisionedActivity[2]

    ?>
</p>





</p>


</body>


</html>