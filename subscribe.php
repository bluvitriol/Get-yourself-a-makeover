<?php

if (isset($_POST['submit'])) {
// Database configuration
$servername = "localhost"; // Change this to your database server name
$username = "root"; // Change this to your database username
$password = ""; // Change this to your database password
$dbname = "ims";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$email = $_POST['email'];

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO subscriptions (email) VALUES (?)");
$stmt->bind_param("s", $email);

if ($stmt->execute()) {
    // If subscription is successful, generate JavaScript for popup
    echo "<script type='text/javascript'>alert('Subscription successful'); window.location = 'form.html';</script>";
} else {
    echo "Error: " . $stmt->error;
}

// Execute the statement
// if ($stmt->execute()) {
//     echo "Subscription successful";
// } else {
//     echo "Error: " . $stmt->error;
// }

// Close connections
$stmt->close();
$conn->close();

} else {
    echo "Form not submitted correctly.";
}

?>

