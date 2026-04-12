<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kyle Palindrome</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .result {
            margin-bottom: 15px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .palindrome {
            color: green;
        }
        .not-palindrome {
            color: red;
        }
    </style>
</head>
<body>

<h1>Palindrome Checker</h1>

<?php
/*
Name: Kyle Klausen
Date: 4/12/26
Assignment: Palindrome Checker - Module 4

Purpose: This program checks whether a given string is a palindrome by comparing it to its reversed form.
*/


/*
--------------------------------------------------
Function: isPalindrome
Purpose: Determines if a string is a palindrome
--------------------------------------------------
*/
function isPalindrome($input) {

    // Normalize string (remove spaces and convert to lowercase)
    $normalized = strtolower(str_replace(' ', '', $input));

    // Reverse the normalized string
    $reversed = strrev($normalized);

    // Compare original and reversed values
    return $normalized === $reversed;
}


/*
--------------------------------------------------
Function: displayResult
Purpose: Displays original string, reversed string,
         and whether it is a palindrome
--------------------------------------------------
*/
function displayResult($text) {

    // Prepare reversed version of original string (for display)
    $reversedDisplay = strrev($text);

    // Call palindrome test function
    $result = isPalindrome($text);

    echo "<div class='result'>";

    // Display original and reversed strings
    echo "<strong>Original:</strong> $text <br>";
    echo "<strong>Reversed:</strong> $reversedDisplay <br>";

    // Display result
    if ($result) {
        echo "<span class='palindrome'><strong>Result:</strong> This is a palindrome.</span>";
    } else {
        echo "<span class='not-palindrome'><strong>Result:</strong> This is NOT a palindrome.</span>";
    }

    echo "</div>";
}


/*
--------------------------------------------------
Main Program Section
Purpose: Stores test cases and runs palindrome checks
--------------------------------------------------
*/

// Array of test strings (3 palindromes, 3 not)
$testStrings = [
    "racecar",
    "madam",
    "level",
    "hello",
    "world",
    "php code"
];

// Loop through each string and display results
foreach ($testStrings as $string) {
    displayResult($string);
}

?>

</body>
</html>