<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Collect and sanitize form data
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Check if passwords match
    if ($password !== $confirm_password) {
        $_SESSION['error'] = "Passwords do not match!";
        header('Location: login.php');
        exit();
    }

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = "Invalid email format!";
        header('Location: login.php');
        exit();
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    try {
        // Check if the email already exists
        $check_email = "SELECT * FROM users WHERE email = ?";
        $stmt_check = $conn->prepare($check_email);
        $stmt_check->execute([$email]);

        if ($stmt_check->rowCount() > 0) {
            $_SESSION['error'] = "Email already exists!";
            header('Location: login.php');
            exit();
        }

        // Insert new user into the database
        $query = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($query);

        if ($stmt->execute([$username, $email, $hashed_password])) {
            $_SESSION['success'] = "Registration successful! Please log in.";
            header('Location: login.php'); 
            exit();
        } else {
            $_SESSION['error'] = "Registration failed. Please try again.";
            header('Location: login.php');
            exit();
        }
    } catch (PDOException $e) {
        $_SESSION['error'] = "Error: " . $e->getMessage();
        header('Location: login.php');
        exit();
    }
}
?>


