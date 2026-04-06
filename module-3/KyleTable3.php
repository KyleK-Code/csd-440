<?php
/**
 * Name: Kyle Klausen
 * Date: 04/04/2026
 * Assignment: Module 3 - PHP Table with Function
 * Description:
 * This program generates an HTML table using nested loops.
 * Each cell displays the sum of two random numbers,
 * calculated using a function from an external file.
 */

// Include external function file
include 'functions.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table with Function</title>

    <style>
        table {
            border-collapse: collapse;
            margin: 20px auto;
        }
        td {
            border: 1px solid black;
            padding: 10px;
            text-align: center;
            width: 60px;
        }
    </style>
</head>
<body>

<h2 style="text-align:center;">PHP Table Using Function</h2>

<table>
    <?php
    $rows = 5;
    $cols = 5;

    // Outer loop (rows)
    for ($i = 0; $i < $rows; $i++) {
    ?>
        <tr>
            <?php
            // Inner loop (columns)
            for ($j = 0; $j < $cols; $j++) {

                // Generate two random numbers
                $num1 = rand(1, 50);
                $num2 = rand(1, 50);

                // Call function from external file
                $sum = addNumbers($num1, $num2);
            ?>
                <td><?php echo $sum; ?></td>
            <?php
            }
            ?>
        </tr>
    <?php
    }
    ?>
</table>

</body>
</html>