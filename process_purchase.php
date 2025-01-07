<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $car_model = htmlspecialchars($_POST['car_model']);
    $full_name = htmlspecialchars($_POST['full_name']);
    $email = htmlspecialchars($_POST['email']);
    $phone_number = htmlspecialchars($_POST['phone_number']);
    $delivery_address = htmlspecialchars($_POST['delivery_address']);
    $payment_method = htmlspecialchars($_POST['payment_method']);

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format.";
        exit;
    }

    // Connect to the database
    $servername = "localhost";
    $username = "root"; // Adjust as per your DB credentials
    $password = ""; // Adjust as per your DB credentials
    $dbname = "car_dealership"; // Replace with your database name

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert data into the database
    $sql = "INSERT INTO purchases (car_model, full_name, email, phone_number, delivery_address, payment_method) 
            VALUES ('$car_model', '$full_name', '$email', '$phone_number', '$delivery_address', '$payment_method')";

    if ($conn->query($sql) === TRUE) {
        echo "<h1>Purchase Successful!</h1>";
        echo "<p>Thank you, $full_name. Your purchase of $car_model has been processed successfully.</p>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the connection
    $conn->close();
} else {
    // If form not submitted, redirect back to the form
    header("Location: index.html");
    exit;
}
?>
