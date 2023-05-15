<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate input data
    $farmer_name = sanitizeInput($_POST["inputName"]);
    $farmer_email = sanitizeInput($_POST["inputEmail4"]);
    $farmer_phone = sanitizeInput($_POST["inputPhone"]);
    $amount = sanitizeInput($_POST["inputAmount"]);
    $description = sanitizeInput($_POST["exampleFormControlTextarea1"]);

    // Process the data, e.g. save it in a database or send an email
    // ...

    // Print submitted data for testing purposes
    echo "Farmer Name: " . $farmer_name . "<br>";
    echo "Farmer Email: " . $farmer_email . "<br>";
    echo "Farmer Phone: " . $farmer_phone . "<br>";
    echo "Amount: " . $amount . "<br>";
    echo "Description: " . $description . "<br>";
}

// Function to sanitize input data
function sanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
