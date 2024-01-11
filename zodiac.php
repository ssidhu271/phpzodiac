<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    $zodiac = array(
        "Monkey",
        "Rooster",
        "Dog",
        "Pig",
        "Rat",
        "Ox",
        "Tiger",
        "Rabbit",
        "Dragon",
        "Snake",
        "Horse",
        "Goat"
    );

    //Initalize variables
    $year = "";
    $animal = "";
    $imagePath = "";

    $currentYear = date("Y");
    $nextYear = $currentYear + 1;

    // Check if the form is submitted
    if (isset($_POST["clear"])) {
        // Reset everything
        $year = "";
        $animal = "";
        $imagePath = "";
    } elseif (isset($_POST["submit"])) {
        $year = $_POST["year"];
        if ($year >= 1900 && $year <= $nextYear) {
            $remainder = $year % 12;
            $animal = $zodiac[$remainder];
            $imagePath = "images/$animal.png";
        } else {
            echo "<script>alert('Year must be between 1900 and $nextYear. Please try again');</script>";
        }
    }

    ?>


    <form action="zodiac.php" method="post">
        <label for="year">Year:</label>
        <input type="number" name="year" id="year" min="1900" max="<?php echo $nextYear; ?>" style="width: calc(100% - 240px);">
        <br>
        <input type="submit" value="Get Zodiac" name="submit" style="padding: 10px 20px; background-color: #4CAF50; color: white; border: none; cursor: pointer;">
        <input type="submit" value="Clear" name="clear" style="padding: 10px 20px; background-color: #f44336; color: white; border: none; cursor: pointer;">
    </form>

    <?php
    if ($year >= 1900 && $year <= 2025 && isset($_POST["submit"]) && $animal) {
        echo "<br>";
        echo "Your zodiac is $animal<br>";
        echo "<img src='$imagePath' alt='$animal'>";
    }
    ?>

</body>

</html>