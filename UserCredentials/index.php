<?php
include_once("config.php");
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Registration Page</title>
</head>
<body>
    <div class="container">
        <form id="registerForm" action="index.php" method="post">
            <h2>Register</h2>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="phone">Phone:</label>
            <input type="text" id="phone" name="phone" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <label for="confirmPassword">Confirm Password:</label>
            <input type="password" id="confirmPassword" name="confirmPassword" required>

            <button type="submit" >Register</button>
            <p><a href="login.php">Login</a></p>
        </form>

<?php
        // Function to sanitize user input
        function sanitizeInput($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        
        // Check if the form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Sanitize input data
            $name = sanitizeInput($_POST["name"]);
            $email = sanitizeInput($_POST["email"]);
            $phone = sanitizeInput($_POST["phone"]);
            $password = sanitizeInput($_POST["password"]);
            $confirmPassword = sanitizeInput($_POST["confirmPassword"]);
        
            // Placeholder for password hashing function (use bcrypt or other secure hashing)
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        
            // Placeholder query to insert user data into the database
            $sql = "INSERT INTO users (name, email, phone, password) VALUES ('$name', '$email', '$phone', '$hashedPassword')";
        
            if ($conn->query($sql) === TRUE) {
                // Registration successful
                echo "Registration successful!";
            } else {
                // Registration failed
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
        
        // Close the database connection
        $conn->close();
        ?>
        
</div>
<script src="scripts.js"></script>
</body>
</html>
