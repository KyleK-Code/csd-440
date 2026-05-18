<!DOCTYPE html>
<html>
<head>
    <title>Kyle JSON Form Program</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f8;
            margin: 40px;
        }

        .container {
            background-color: white;
            padding: 25px;
            border-radius: 8px;
            max-width: 700px;
            margin: auto;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        h1, h2 {
            color: #2c3e50;
        }

        label {
            display: block;
            margin-top: 12px;
            font-weight: bold;
        }

        input, select, textarea {
            width: 100%;
            padding: 8px;
            margin-top: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            margin-top: 20px;
            background-color: #2c7be5;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #1a5fb4;
        }

        pre {
            background-color: #1e1e1e;
            color: #00ff90;
            padding: 15px;
            border-radius: 6px;
            overflow-x: auto;
        }

        .error {
            background-color: #ffd6d6;
            color: #8a0000;
            padding: 15px;
            border-radius: 6px;
        }
    </style>
</head>
<body>

<div class="container">

<?php
/*
    Name: Kyle Klausen
    Date: 05/16/2026
    Assignment: Module 10 - JSON Form Program
    Course: CSD440

    Purpose:
    This PHP program displays an HTML form that collects at least
    eight fields of user data. When the form is submitted, the PHP
    code validates the input, stores the data in an associative array,
    encodes the data into JSON format using json_encode(), and displays
    the JSON output in a formatted display.

    Inputs:
    First name, last name, email, phone number, address, city, state,
    zip code, program, and comments.

    Process:
    The program checks that required fields are not empty. If the form
    is complete, the data is encoded into JSON format.

    Output:
    A formatted JSON display or an error message if required fields
    are missing.
*/

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $firstName = trim($_POST["firstName"]);
    $lastName = trim($_POST["lastName"]);
    $email = trim($_POST["email"]);
    $phone = trim($_POST["phone"]);
    $address = trim($_POST["address"]);
    $city = trim($_POST["city"]);
    $state = trim($_POST["state"]);
    $zip = trim($_POST["zip"]);
    $program = trim($_POST["program"]);
    $comments = trim($_POST["comments"]);

    if (
        empty($firstName) || empty($lastName) || empty($email) ||
        empty($phone) || empty($address) || empty($city) ||
        empty($state) || empty($zip) || empty($program)
    ) {
        echo "<h1>Error</h1>";
        echo "<div class='error'>Please complete all required fields before submitting the form.</div>";
        echo "<p><a href='Kyle_JSON.php'>Return to Form</a></p>";
    } else {

        $formData = array(
            "first_name" => $firstName,
            "last_name" => $lastName,
            "email" => $email,
            "phone" => $phone,
            "address" => $address,
            "city" => $city,
            "state" => $state,
            "zip_code" => $zip,
            "program" => $program,
            "comments" => $comments
        );

        $jsonData = json_encode($formData, JSON_PRETTY_PRINT);

        echo "<h1>JSON Form Output</h1>";
        echo "<p>The form data was successfully encoded into JSON format.</p>";
        echo "<pre>" . htmlspecialchars($jsonData) . "</pre>";
        echo "<p><a href='Kyle_JSON.php'>Submit Another Form</a></p>";
    }

} else {
?>

    <h1>Kyle JSON Form Program</h1>
    <p>Please complete the form below. All fields except comments are required.</p>

    <form method="post" action="Kyle_JSON.php">

        <label>First Name:</label>
        <input type="text" name="firstName" required>

        <label>Last Name:</label>
        <input type="text" name="lastName" required>

        <label>Email Address:</label>
        <input type="email" name="email" required>

        <label>Phone Number:</label>
        <input type="text" name="phone" required>

        <label>Street Address:</label>
        <input type="text" name="address" required>

        <label>City:</label>
        <input type="text" name="city" required>

        <label>State:</label>
        <input type="text" name="state" required>

        <label>Zip Code:</label>
        <input type="text" name="zip" required>

        <label>Program of Study:</label>
        <select name="program" required>
            <option value="">Select a Program</option>
            <option value="Software Development">Software Development</option>
            <option value="Web Development">Web Development</option>
            <option value="Cybersecurity">Cybersecurity</option>
            <option value="Database Management">Database Management</option>
        </select>

        <label>Comments:</label>
        <textarea name="comments" rows="4"></textarea>

        <input type="submit" value="Submit Form">

    </form>

<?php
}
?>

</div>

</body>
</html>