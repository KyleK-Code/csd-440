<?php
/*
Author: Kyle Klausen
Module 7
Date: 04/25/26
Description: Validates submitted form data and displays either the entered data or an error message.
*/

$errors = [];

$firstName = trim($_POST["firstName"] ?? "");
$lastName = trim($_POST["lastName"] ?? "");
$age = trim($_POST["age"] ?? "");
$email = trim($_POST["email"] ?? "");
$phone = trim($_POST["phone"] ?? "");
$reservationDate = trim($_POST["reservationDate"] ?? "");
$guests = trim($_POST["guests"] ?? "");

if ($firstName == "") {
    $errors[] = "First name is required.";
}

if ($lastName == "") {
    $errors[] = "Last name is required.";
}

if ($age == "" || !is_numeric($age) || $age < 1) {
    $errors[] = "Age must be a valid number greater than 0.";
}

if ($email == "" || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Email must be entered in a valid format.";
}

if ($phone == "") {
    $errors[] = "Phone number is required.";
}

if ($reservationDate == "") {
    $errors[] = "Reservation date is required.";
}

if ($guests == "" || !is_numeric($guests) || $guests < 1) {
    $errors[] = "Number of guests must be a valid number greater than 0.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kyle Response</title>
</head>
<body>

<?php if (count($errors) > 0): ?>

    <h1>Form Submission Error</h1>
    <p>Please correct the following problems:</p>

    <ul>
        <?php foreach ($errors as $error): ?>
            <li><?php echo htmlspecialchars($error); ?></li>
        <?php endforeach; ?>
    </ul>

    <a href="KyleForm.php">Return to Form</a>

<?php else: ?>

    <h1>Form Submitted Successfully</h1>

    <table border="1" cellpadding="8">
        <tr>
            <th>Field</th>
            <th>Entered Data</th>
        </tr>
        <tr>
            <td>First Name</td>
            <td><?php echo htmlspecialchars($firstName); ?></td>
        </tr>
        <tr>
            <td>Last Name</td>
            <td><?php echo htmlspecialchars($lastName); ?></td>
        </tr>
        <tr>
            <td>Age</td>
            <td><?php echo htmlspecialchars($age); ?></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><?php echo htmlspecialchars($email); ?></td>
        </tr>
        <tr>
            <td>Phone Number</td>
            <td><?php echo htmlspecialchars($phone); ?></td>
        </tr>
        <tr>
            <td>Reservation Date</td>
            <td><?php echo htmlspecialchars($reservationDate); ?></td>
        </tr>
        <tr>
            <td>Number of Guests</td>
            <td><?php echo htmlspecialchars($guests); ?></td>
        </tr>
    </table>

    <br>
    <a href="KyleForm.php">Submit Another Form</a>

<?php endif; ?>

</body>
</html>