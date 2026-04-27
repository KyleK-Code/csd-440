<?php
/*
Author: Kyle Klausen
Module 7
Date: 04/25/26
Description: Displays a form that collects seven different fields using multiple data types.
*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kyle Form</title>
</head>
<body>
    <h1>Customer Information Form</h1>

    <form action="KyleResponse.php" method="post">
        <label>First Name:</label><br>
        <input type="text" name="firstName"><br><br>

        <label>Last Name:</label><br>
        <input type="text" name="lastName"><br><br>

        <label>Age:</label><br>
        <input type="number" name="age"><br><br>

        <label>Email:</label><br>
        <input type="email" name="email"><br><br>

        <label>Phone Number:</label><br>
        <input type="tel" name="phone"><br><br>

        <label>Reservation Date:</label><br>
        <input type="date" name="reservationDate"><br><br>

        <label>Number of Guests:</label><br>
        <input type="number" name="guests"><br><br>

        <input type="submit" value="Submit Form">
    </form>
</body>
</html>