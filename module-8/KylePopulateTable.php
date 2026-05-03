<!DOCTYPE html>
<html>
<head>
    <title>Kyle Populate Table</title>
</head>
<body>

<?php
/*
    Name: Kyle Klausen
    Date: 5/1/2026
    Assignment: Module 8 - Populate Table
    Purpose: Inserts sample CS2 team records into the table using MySQLi.
*/

$servername = "localhost";
$username = "student1";
$password = "pass";
$dbname = "baseball_01";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("<p>Connection failed: " . mysqli_connect_error() . "</p>");
}

$sql = "INSERT INTO kyle_cs2_teams 
(team_name, region, ranking, founded_year, prize_earnings) VALUES
('Navi', 'Europe', 1, 2009, 2500000.00),
('Vitality', 'Europe', 2, 2013, 2100000.00),
('FaZe Clan', 'International', 3, 2010, 3000000.00),
('G2 Esports', 'Europe', 4, 2014, 1800000.00),
('Team Liquid', 'North America', 5, 2000, 2200000.00),
('MOUZ', 'Europe', 6, 2002, 1200000.00)";

if (mysqli_query($conn, $sql)) {
    echo "<h2>Records inserted successfully.</h2>";
} else {
    echo "<h2>Error inserting records: " . mysqli_error($conn) . "</h2>";
}

mysqli_close($conn);
?>

</body>
</html>