/* Author: Kyle Klausen
Date: 04/03/26
Assignment: Module-2 */

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Random Number Table</title>

    <style>
        table {
            border-collapse: collapse;
            margin: 20px auto;
        }
        td {
            border: 1px solid black;
            padding: 10px;
            text-align: center;
            width: 50px;
        }
    </style>
</head>
<body>

<h2 style="text-align:center;">PHP Random Number Table</h2>

<table>
    <?php
    /**
     * Name: Kyle Klausen
     * Date: 04/05/2026
     * Assignment: Module - PHP Nested Loop Table
     * Description:
     * This program generates a 2D HTML table.
     * The table structure is written in HTML,
     * while PHP nested loops populate each cell
     * with random numbers between 1 and 100.
     */

    // Define number of rows and columns
    $rows = 5;
    $cols = 5;

    // Outer loop for rows
    for ($i = 0; $i < $rows; $i++) {
    ?>
        <tr>
            <?php
            // Inner loop for columns
            for ($j = 0; $j < $cols; $j++) {
                $randomNumber = rand(1, 100);
            ?>
                <td><?php echo $randomNumber; ?></td>
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