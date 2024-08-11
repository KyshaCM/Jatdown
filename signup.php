<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <a  class="back-button" href="Home.html"> Back to Home</a>
    <div class="signup-container">
        <form id="signupForm" method="post" action="signup-process.php" class="signup-form" onsubmit="return validateForm()">
            <h2>Jatdown</h2>
            <div class="input-group">
                <label for="firstname">Firstname</label>
                <input type="text" id="firstname" name="firstname" required>
                <span id="firstnameError" class="error-message"></span>
            </div>
            <div class="input-group">
                <label for="lastname">Lastname</label>
                <input type="text" id="lastname" name="lastname" required>
                <span id="lastnameError" class="error-message"></span>
            </div>
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
                <span id="usernameError" class="error-message"></span>
            </div>
            <div class="input-group">
                <label for="email">Email</label>
                <input type="text" id="email" name="email" required>
                <span id="emailError" class="error-message"></span>
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
                <span id="passwordError" class="error-message"></span>
            </div>
            <?php if(isset($_GET['error']) && $_GET['error']==1): ?>
                <div class="error-message-server">Username/Email already in use</div>
            <?php endif; ?>
            <?php if(isset($_GET['error']) && $_GET['error']==2): ?>
                <div class="error-message-server">Something went wrong. Please try again!</div>
            <?php endif; ?>
            <button type="submit">Sign Up</button>
        </form>
    </div>
    <script>
function validateForm() {
    let valid = true;

    // Clear previous error messages
    document.getElementById('firstnameError').style.display = 'none';
    document.getElementById('lastnameError').style.display = 'none';
    document.getElementById('usernameError').style.display = 'none';
    document.getElementById('emailError').style.display = 'none';
    document.getElementById('passwordError').style.display = 'none';

    const firstname = document.getElementById('firstname').value;
    if (firstname.length < 1) {
        document.getElementById('firstnameError').innerText = 'Firstname is required';
        document.getElementById('firstnameError').style.display = 'block';
        valid = false;
    }
    const lastname = document.getElementById('lastname').value;
    if (lastname.length < 1) {
        document.getElementById('lastnameError').innerText = 'Lastname is required';
        document.getElementById('lastnameError').style.display = 'block';
        valid = false;
    }

    // Username validation
    const username = document.getElementById('username').value;
    if (username.length < 3) {
        document.getElementById('usernameError').innerText = 'Username must be at least 3 characters';
        document.getElementById('usernameError').style.display = 'block';
        valid = false;
    }

    // Email validation
    const email = document.getElementById('email').value;
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailPattern.test(email)) {
        document.getElementById('emailError').innerText = 'Please enter a valid email address';
        document.getElementById('emailError').style.display = 'block';
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
    background-color:  #9d9dc9;
    color: white;
    text-decoration: none;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.back-button:hover {
    background-color: #4d4d7cc4;
}

.signup-container {
    background-color: #ffffff;
    padding: 40px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width: 700px; /* Adjusted width */
    max-width: 90%; /* Ensures the form is responsive */
}

.signup-form {
    display: flex;
    flex-direction: column;
    font-size: 1.2em;
    align-items: center; /* Center the form content */
}

.signup-form h2 {
    margin-bottom: 20px; /* Space below the heading */
    text-align: center; /* Center the heading text */
}

.input-group {
    margin-bottom: 20px;
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
.error-message-server {
    color: red;
    font-size: 0.9em;
}


</style>
