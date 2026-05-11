<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kyle Query</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #eef2f7;
            padding: 30px;
        }

        .container {
            width: 850px;
            margin: auto;
            background-color: white;
            padding: 25px;
            border-radius: 10px;
        }

        h1 {
            color: #0b3d91;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #999;
        }

        th {
            background-color: #0b3d91;
            color: white;
            padding: 10px;
        }

        td {
            padding: 10px;
            text-align: center;
        }

        input[type=text] {
            padding: 10px;
            width: 250px;
        }

        input[type=submit] {
            padding: 10px 15px;
            background-color: #0b3d91;
            color: white;
            border: none;
            cursor: pointer;
        }

        a {
            display: inline-block;
            margin-top: 20px;
        }
    </style>
</head>

<body>

<div class="container">

<?php
/*
    Name: Kyle Klausen
    Date: 5/09/2026
    Assignment: Module 9
    Purpose: Search for CS2 teams using MySQLi.
*/

$servername = "localhost";
$username = "student1";
$password = "pass";
$dbname = "baseball_01";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>

<h1>Search CS2 Teams</h1>

<form method="post" action="">
    <label>Enter Team Name:</label><br><br>

    <input type="text" name="team_name" required>

    <input type="submit" value="Search">
</form>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $team_name = mysqli_real_escape_string($conn, $_POST['team_name']);

    $sql = "SELECT * FROM kyle_cs2_teams
            WHERE team_name LIKE '%$team_name%'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {

        echo "<table>";

        echo "<tr>
                <th>ID</th>
                <th>Team Name</th>
                <th>Region</th>
                <th>Ranking</th>
                <th>Founded Year</th>
                <th>Prize Earnings</th>
              </tr>";

        while($row = mysqli_fetch_assoc($result)) {

            echo "<tr>";

            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["team_name"] . "</td>";
            echo "<td>" . $row["region"] . "</td>";
            echo "<td>" . $row["ranking"] . "</td>";
            echo "<td>" . $row["founded_year"] . "</td>";
            echo "<td>$" . number_format($row["prize_earnings"], 2) . "</td>";

            echo "</tr>";
        }

        echo "</table>";

    } else {

        echo "<p>No teams found.</p>";
    }
}

mysqli_close($conn);

?>

<br>

<a href="KyleIndex.php">Return to Index</a>

</div>

</body>
</html>