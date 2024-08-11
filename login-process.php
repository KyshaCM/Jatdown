<?php
session_start();
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

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user input
    $username = $_POST["username"];
    $password = md5($_POST["password"]);
    $user_captcha = $_POST['captcha'];

    if ($user_captcha != $_SESSION['captcha_code']) {
        header("Location: login.php?error=2");
        return false;
    }
    // Hash the password (use a more secure hashing method in production)
   

    // Query to check if the username and password match a record in the database
    $query = "SELECT id,username,firstname,lastname,email,created_at FROM users WHERE username=? AND password=?";
    $stmt = $conn->prepare($query);

    if (!$stmt) {
        die('Prepare failed: (' . $conn->errno . ') ' . $conn->error);
    }
    $stmt->bind_param('ss', $username,$password); 
    $stmt->execute();
    $result = $stmt->get_result();
    // Check if a matching record is found
    if ($result->num_rows > 0) {
        // Authentication successful, redirect or perform other actions as needed
        $record = $result->fetch_assoc();
        $_SESSION['userinfo'] = $record;
        header("Location: Directpage.php");
    } else {
        // Authentication failed
        header("Location: login.php?error=1");
    }
}

// Close the database connection
$conn->close();
?>
