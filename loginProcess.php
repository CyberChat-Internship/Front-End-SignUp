<?php
require_once 'config.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Collect and sanitize form data
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    // Validate email and password inputs
    if (empty($email) || empty($password)) {
        $_SESSION['error'] = "Email and password are required!";
        header('Location: login.php');
        exit();
    }

    // SQL query to check the user
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$email]);

    // Fetch user information
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) { // Corrected variable name to $user for consistency
        if (password_verify($password, $user['password'])) {
            // Store user information in session
            $_SESSION['id'] = $user['id'];
            $_SESSION['username'] = $user['username'];

            // Redirect to the desired page after successful login
            header('Location: chat.php');
            exit();
        } else {
            $_SESSION['error'] = "Invalid email or password!";
            header('Location: login.php');
            exit();
        }
    } else {
        $_SESSION['error'] = "No user found with that email.";
        header('Location: login.php');
        exit();
    }
}
?>


