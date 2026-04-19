<?php
/*
    Name: Kyle Klausen
    Date: April 19, 2026
    Assignment: Module - 6.2 - MyInteger Class Program

    Purpose: This program defines a class named MyInteger that stores a single
    integer value and includes methods to determine whether a number is even,
    odd, or prime. The program also demonstrates getter and setter methods
    and tests two class instances.
*/

/*
    Class: KyleMyInteger
    This class stores one integer and provides methods to evaluate it.
*/
class KyleMyInteger {
    private $value;

    /*
        Constructor method
        Sets the integer value when an object is created.
    */
    public function __construct($value) {
        $this->value = $value;
    }

    /*
        Getter method
        Returns the current integer value.
    */
    public function getValue() {
        return $this->value;
    }

    /*
        Setter method
        Updates the integer value.
    */
    public function setValue($value) {
        $this->value = $value;
    }

    /*
        Method: isEven
        Accepts an integer parameter and returns true if the number is even.
    */
    public function isEven($number) {
        return $number % 2 == 0;
    }

    /*
        Method: isOdd
        Accepts an integer parameter and returns true if the number is odd.
    */
    public function isOdd($number) {
        return $number % 2 != 0;
    }

    /*
        Method: isPrime
        Checks whether the object's stored integer value is prime.
    */
    public function isPrime() {
        if ($this->value <= 1) {
            return false;
        }

        for ($i = 2; $i <= sqrt($this->value); $i++) {
            if ($this->value % $i == 0) {
                return false;
            }
        }

        return true;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KyleMyInteger</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
            color: #333;
        }

        h1, h2 {
            color: #222;
        }

        .results {
            background-color: white;
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            width: 600px;
        }

        p {
            margin: 6px 0;
        }
    </style>
</head>
<body>

    <h1>MyInteger Class Program</h1>
    <p>This program creates two instances of the MyInteger class and tests all required methods.</p>

    <?php
        /*
            Create two instances of the class.
        */
        $integer1 = new KyleMyInteger(10);
        $integer2 = new KyleMyInteger(17);

        /*
            Display results for first object.
        */
        echo "<div class='results'>";
        echo "<h2>Testing Instance 1</h2>";
        echo "<p><strong>Initial Value:</strong> " . $integer1->getValue() . "</p>";
        echo "<p><strong>isEven(10):</strong> " . ($integer1->isEven(10) ? "True" : "False") . "</p>";
        echo "<p><strong>isOdd(10):</strong> " . ($integer1->isOdd(10) ? "True" : "False") . "</p>";
        echo "<p><strong>isPrime():</strong> " . ($integer1->isPrime() ? "True" : "False") . "</p>";

        $integer1->setValue(13);
        echo "<p><strong>Updated Value After Setter:</strong> " . $integer1->getValue() . "</p>";
        echo "<p><strong>isPrime() After Update:</strong> " . ($integer1->isPrime() ? "True" : "False") . "</p>";
        echo "</div>";

        /*
            Display results for second object.
        */
        echo "<div class='results'>";
        echo "<h2>Testing Instance 2</h2>";
        echo "<p><strong>Initial Value:</strong> " . $integer2->getValue() . "</p>";
        echo "<p><strong>isEven(17):</strong> " . ($integer2->isEven(17) ? "True" : "False") . "</p>";
        echo "<p><strong>isOdd(17):</strong> " . ($integer2->isOdd(17) ? "True" : "False") . "</p>";
        echo "<p><strong>isPrime():</strong> " . ($integer2->isPrime() ? "True" : "False") . "</p>";

        $integer2->setValue(20);
        echo "<p><strong>Updated Value After Setter:</strong> " . $integer2->getValue() . "</p>";
        echo "<p><strong>isPrime() After Update:</strong> " . ($integer2->isPrime() ? "True" : "False") . "</p>";
        echo "</div>";
    ?>

</body>
</html>