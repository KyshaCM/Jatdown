<?php 
    require_once 'middleware.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
   <a  class="back-button" href="Home.html"> Back to Home</a>
    <div class="login-container">
        <form id="loginForm" method="post" action="login-process.php" class="login-form" onsubmit="return validateForm()">
            <h2>Jatdown</h2>
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
                <span id="usernameError" class="error-message"></span>
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
                <span id="passwordError" class="error-message"></span>
            </div>
            <div class="input-group">
                <img src="captcha.php" alt="CAPTCHA">
                <input type="text" name="captcha" placeholder="Enter CAPTCHA">
            </div>
            <div class="error-message-server">
            <?php 
                if(isset($_GET['error']) && $_GET['error']==2) {
                    echo "<span class=''>Invalid captcha<span>";
                }
                if(isset($_GET['error']) && $_GET['error']!=2){
                    echo "<span class=''>Invalid username/password.<span>";
                }
            ?>
            </div>
            <button type="submit">Log In</button>
        </form>
    </div>
    <script></script>


    <script>
        function validateForm() {
    let valid = true;

    // Clear previous error messages
    document.getElementById('usernameError').style.display = 'none';
    document.getElementById('passwordError').style.display = 'none';

    // Username validation
    const username = document.getElementById('username').value;
    if (username.length < 3) {
        document.getElementById('usernameError').innerText = 'Username must be at least 3 characters';
        document.getElementById('usernameError').style.display = 'block';
        valid = false;
    }

    // Password validation
    const password = document.getElementById('password').value;
    if (password.length < 6) {
        document.getElementById('passwordError').innerText = 'Password must be at least 6 characters';
        document.getElementById('passwordError').style.display = 'block';
        valid = false;
    }

    return valid;
}

function goHome() {
    window.location.href = 'Home.html';
}

    </script>
</body>
</html>
<style>
   body {
    font-family: Arial, sans-serif;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background-color: #60608f;
    margin: 0;
    position: relative;
}

.back-button {
    position: absolute;
    top: 20px;
    left: 20px;
    padding: 10px 20px;
    background-color: #9d9dc9;
    color: white;
    text-decoration: none;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.back-button:hover {
    background-color: #4d4d7cc4;
}

.login-container {
    background-color: #ffffff;
    padding: 60px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width: 900px; /* Reduced width */
}

.login-form {
    display: flex;
    flex-direction: column;
    font-size: 1.2em; /* Reduced font size */
    align-items: center; /* Center the form content */
}

.login-form h2 {
    margin-bottom: 40px; /* Space below the heading */
    text-align: center; /* Center the heading text */
}

.input-group {
    margin-bottom: 20px; /* Reduced spacing */
}

.input-group label {
    margin-bottom: 10px;
}

.input-group input {
    padding: 15px;
    border: 1px solid #cccccc;
    border-radius: 5px;
    font-size: 1em;
    width: 100%; /* Full width of input container */
}

button {
    padding: 15px;
    background-color: #9d9dc9;
    color: #ffffff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 1em;
}

button:hover {
    background-color: #4d4d7cc4;
}

.error-message {
    color: red;
    font-size: 0.9em;
    display: none;
}
.error-message-server{
    color: red;
    font-size: 0.9em;
}

</style>