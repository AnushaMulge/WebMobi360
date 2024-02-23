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
    <title>Forgot Password Page</title>
</head>
<body>
    <div class="container">
        <form id="forgotPasswordForm" action="forgotpassword.php" method="post">
            <h2>Forgot Password</h2>
            <label for="resetEmail">Enter your email:</label>
            <input type="email" id="resetEmail" name="resetEmail" required>

            <label for="password">New Password:</label>
            <input type="password" id="newPassword" name="newPassword" required>

            <label for="confirmPassword">Confirm Password:</label>
            <input type="password" id="confirmPassword" name="confirmPassword" required>

            <button type="submit">Reset Password</button>
            <p><a href="login.php">Login</a></p>
        </form>

<?php
// Include your database connection configuration
include_once 'config.php';

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
    $resetEmail = sanitizeInput($_POST["resetEmail"]);
    $newPassword = sanitizeInput($_POST["newPassword"]);
    $confirmPassword = sanitizeInput($_POST["confirmPassword"]);

    // Placeholder query to check if the email exists in the database
    $checkEmailQuery = "SELECT * FROM users WHERE email = '$resetEmail'";
    $result = $conn->query($checkEmailQuery);

    if ($result->num_rows > 0) {
        $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);

        // Placeholder query to update the user's password
        $updatePasswordQuery = "UPDATE users SET password = '$hashedPassword' WHERE email = '$resetEmail'";
        
        if ($conn->query($updatePasswordQuery) === TRUE) {
            // Send a password reset email (implement your email sending logic here)

            echo "Password reset successful."; // Note: Remove this line in production!
        } else {
            echo "Error updating password: " . $conn->error;
        }
    } else {
        echo "Email not found.";
    }
}

// Close the database connection
$conn->close();
?>

</div>
    <script src="script.js"></script>
</body>
</html>