// For Login Page
document.getElementById("loginForm").addEventListener("submit", function(event) {
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;

    if (!username || !password) {
        alert("Username and Password are required.");
        event.preventDefault();
    }
});

// For Registration Page
document.getElementById("registerForm").addEventListener("submit", function(event) {
    var name = document.getElementById("name").value;
    var email = document.getElementById("email").value;
    var phone = document.getElementById("phone").value;
    var password = document.getElementById("password").value;
    var confirmPassword = document.getElementById("confirmPassword").value;

    if (!name || !email || !phone || !password || !confirmPassword) {
        alert("All fields are required.");
        event.preventDefault();
    } else if (password !== confirmPassword) {
        alert("Passwords do not match.");
        event.preventDefault();
    }
});

// For Forgot Password Page
document.getElementById("forgotPasswordForm").addEventListener("submit", function(event) {
    var resetEmail = document.getElementById("resetEmail").value;

    if (!resetEmail) {
        alert("Email is required.");
        event.preventDefault();
    }
});
