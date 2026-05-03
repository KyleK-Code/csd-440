<!DOCTYPE html>
<html>
<head>
    <title>Kyle Query Table</title>
    <style>
        table {
            border-collapse: collapse;
            width: 80%;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #dddddd;
        }
    </style>
</head>
<body>

<?php
/*
    Name: Kyle Klausen
    Date: 5/1/2026
    Assignment: Module 8 - Query Table
    Purpose: Queries and displays CS2 team records using MySQLi.
*/

$servername = "localhost";
$username = "student1";
$password = "pass";
$dbname = "baseball_01";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("<p>Connection failed: " . mysqli_connect_error() . "</p>");
}

$sql = "SELECT team_id, team_name, region, ranking, founded_year, prize_earnings 
        FROM kyle_cs2_teams 
        ORDER BY ranking ASC";

$result = mysqli_query($conn, $sql);

echo "<h2>CS2 Teams Table</h2>";

if (mysqli_num_rows($result) > 0) {
    echo "<table>";
    echo "<tr>
            <th>Team ID</th>
            <th>Team Name</th>
            <th>Region</th>
            <th>Ranking</th>
            <th>Founded Year</th>
            <th>Prize Earnings</th>
          </tr>";

    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $row['team_id'] . "</td>";
        echo "<td>" . $row['team_name'] . "</td>";
        echo "<td>" . $row['region'] . "</td>";
        echo "<td>" . $row['ranking'] . "</td>";
        echo "<td>" . $row['founded_year'] . "</td>";
        echo "<td>$" . number_format($row['prize_earnings'], 2) . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "<p>No records found.</p>";
}

mysqli_close($conn);
?>

</body>
</html>