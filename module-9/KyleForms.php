<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kyle Forms</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #eef2f7;
            padding: 30px;
        }

        .container {
            width: 700px;
            margin: auto;
            background-color: white;
            padding: 25px;
            border-radius: 10px;
        }

        h1 {
            color: #0b3d91;
        }

        input[type=text],
        input[type=number] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 15px;
        }

        input[type=submit] {
            padding: 12px 18px;
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
    Purpose: Add records to the CS2 teams table using MySQLi.
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

<h1>Add New CS2 Team</h1>

<form method="post" action="">

    <label>Team Name</label>
    <input type="text" name="team_name" required>

    <label>Region</label>
    <input type="text" name="region" required>

    <label>Ranking</label>
    <input type="number" name="ranking" required>

    <label>Founded Year</label>
    <input type="number" name="founded_year" required>

    <label>Prize Earnings</label>
    <input type="number" step="0.01" name="prize_earnings" required>

    <input type="submit" value="Add Team">

</form>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $team_name = mysqli_real_escape_string($conn, $_POST['team_name']);
    $region = mysqli_real_escape_string($conn, $_POST['region']);
    $ranking = $_POST['ranking'];
    $founded_year = $_POST['founded_year'];
    $prize_earnings = $_POST['prize_earnings'];

    $sql = "INSERT INTO kyle_cs2_teams
            (team_name, region, ranking, founded_year, prize_earnings)
            VALUES
            ('$team_name', '$region', '$ranking',
             '$founded_year', '$prize_earnings')";

    if (mysqli_query($conn, $sql)) {

        echo "<h3>New team added successfully.</h3>";

    } else {

        echo "<h3>Error: " . mysqli_error($conn) . "</h3>";
    }
}

mysqli_close($conn);

?>

<br>

<a href="KyleIndex.php">Return to Index</a>

</div>

</body>
</html>