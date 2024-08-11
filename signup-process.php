<?php
require_once "common_functions.php";
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "security";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form data when the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $firstname =  $_POST["firstname"];
    $lastname =  $_POST["lastname"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Encrypt the password
    $hashed_password = md5($password);

    if(is_username_email_exists($conn, $username, $email)) {
        //return error
        header("Location: signup.php?error=1"); //error 1=username/email exists, 2=error general'
        return false;
    }
    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO users (firstname,lastname,email, username, password) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss",$firstname, $lastname,$email, $username, $hashed_password);

    // Execute the statement
    if ($stmt->execute() === TRUE) {
        // Redirect to login.html after successful registration
        header("Location: login.php");
    } else {
        header("Location: signup.php?error=2");
    }

    // Close the statement
    $stmt->close();
}

// Close the database connection
$conn->close();
?>
