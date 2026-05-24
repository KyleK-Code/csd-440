<!DOCTYPE html>
<html>
<head>
    <title>Kyle Create Table</title>
</head>
<body>

<?php
/*
    Name: Kyle Klausen
    Date: 5/1/2026
    Assignment: Module 8 - Create Table
    Purpose: Creates a CS2 teams table using MySQLi.
*/

$servername = "localhost";
$username = "student1";
$password = "pass";
$dbname = "baseball_01";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("<p>Connection failed: " . mysqli_connect_error() . "</p>");
}

$sql = "CREATE TABLE kyle_cs2_teams (
    team_id INT AUTO_INCREMENT PRIMARY KEY,
    team_name VARCHAR(50) NOT NULL,
    region VARCHAR(50),
    ranking INT,
    founded_year INT,
    prize_earnings DECIMAL(10,2)
)";

if (mysqli_query($conn, $sql)) {
    echo "<h2>Table kyle_cs2_teams created successfully.</h2>";
} else {
    echo "<h2>Error creating table: " . mysqli_error($conn) . "</h2>";
}

mysqli_close($conn);
?>

</body>
</html>