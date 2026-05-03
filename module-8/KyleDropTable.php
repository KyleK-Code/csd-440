<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Kyle Drop Table</title>
</head>
<body>

<?php
/*
    Name: Kyle Klausen
    Date: 5/1/2026
    Assignment: Module 8 - Drop Table
    Purpose: Drops the CS2 teams table using MySQLi.
*/

$servername = "localhost";
$username = "student1";
$password = "pass";
$dbname = "baseball_01";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("<p>Connection failed: " . mysqli_connect_error() . "</p>");
}

$sql = "DROP TABLE IF EXISTS kyle_cs2_teams";

if (mysqli_query($conn, $sql)) {
    echo "<h2>Table kyle_cs2_teams dropped successfully.</h2>";
} else {
    echo "<h2>Error dropping table: " . mysqli_error($conn) . "</h2>";
}

mysqli_close($conn);
?>

</body>
</html>