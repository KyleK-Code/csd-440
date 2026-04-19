<?php
/*
    Name: Kyle Klausen
    Date: April 17, 2026
    Assignment: Module - 5.2 - Customers Array Program

    Purpose: This program creates and displays an array of customers and uses
    array methods to find and display customer records based on different data fields.
*/

/*
    Create an array of customers.
    Each customer includes first name, last name, age, and phone number.
*/
$customers = array(
    array("firstName" => "John", "lastName" => "Smith", "age" => 25, "phone" => "555-1001"),
    array("firstName" => "Emma", "lastName" => "Johnson", "age" => 31, "phone" => "555-1002"),
    array("firstName" => "Liam", "lastName" => "Brown", "age" => 19, "phone" => "555-1003"),
    array("firstName" => "Olivia", "lastName" => "Davis", "age" => 42, "phone" => "555-1004"),
    array("firstName" => "Noah", "lastName" => "Miller", "age" => 28, "phone" => "555-1005"),
    array("firstName" => "Ava", "lastName" => "Wilson", "age" => 35, "phone" => "555-1006"),
    array("firstName" => "Ethan", "lastName" => "Moore", "age" => 22, "phone" => "555-1007"),
    array("firstName" => "Sophia", "lastName" => "Taylor", "age" => 27, "phone" => "555-1008"),
    array("firstName" => "Mason", "lastName" => "Anderson", "age" => 45, "phone" => "555-1009"),
    array("firstName" => "Isabella", "lastName" => "Thomas", "age" => 30, "phone" => "555-1010")
);

/*
    Function to display a list of customer records in a table.
*/
function displayCustomers($title, $customerList) {
    echo "<h2>" . $title . "</h2>";

    if (count($customerList) > 0) {
        echo "<table border='1' cellpadding='8' cellspacing='0'>";
        echo "<tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Age</th>
                <th>Phone Number</th>
              </tr>";

        foreach ($customerList as $customer) {
            echo "<tr>";
            echo "<td>" . $customer["firstName"] . "</td>";
            echo "<td>" . $customer["lastName"] . "</td>";
            echo "<td>" . $customer["age"] . "</td>";
            echo "<td>" . $customer["phone"] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "<p>No matching customers found.</p>";
    }
}

/*
    Display all customers first.
*/
$allCustomers = $customers;

/*
    Find customers age 30 or older.
*/
$customersAge30Plus = array_filter($customers, function($customer) {
    return $customer["age"] >= 30;
});

/*
    Find the customer with the first name Emma.
*/
$customersNamedEmma = array_filter($customers, function($customer) {
    return $customer["firstName"] === "Emma";
});

/*
    Find the customer with the last name Miller.
*/
$customersWithLastNameMiller = array_filter($customers, function($customer) {
    return $customer["lastName"] === "Miller";
});

/*
    Find the customer with the phone number 555-1008.
*/
$customersWithPhone1008 = array_filter($customers, function($customer) {
    return $customer["phone"] === "555-1008";
});
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kyle Customers</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
        }

        h1, h2 {
            color: #333;
        }

        table {
            background-color: #ffffff;
            margin-bottom: 20px;
            border-collapse: collapse;
            width: 80%;
        }

        th {
            background-color: #2c3e50;
            color: white;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        p {
            font-weight: bold;
            color: #cc0000;
        }
    </style>
</head>
<body>

    <h1>Customer Records Program</h1>
    <p>This program creates an array of customers and displays search results using different data fields.</p>

    <?php
        displayCustomers("All Customers", $allCustomers);
        displayCustomers("Customers Age 30 or Older", $customersAge30Plus);
        displayCustomers("Customer With First Name Emma", $customersNamedEmma);
        displayCustomers("Customer With Last Name Miller", $customersWithLastNameMiller);
        displayCustomers("Customer With Phone Number 555-1008", $customersWithPhone1008);
    ?>

</body>
</html>