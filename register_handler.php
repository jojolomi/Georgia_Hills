<?php
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Validate inputs
    if ($password !== $confirm_password) {
        header("Location: registration.html?error=Passwords do not match");
        exit;
    }

    try {
        $conn = DB::connect();
        
        // Check if user exists
        $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? OR email = ?");
        $stmt->execute([$username, $email]);
        
        if ($stmt->fetch()) {
            header("Location: registration.html?error=Username or email already exists");
            exit;
        }

        // Hash password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        
        // Insert new user
        $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        $stmt->execute([$username, $email, $hashed_password]);
        
        header("Location: login.html?success=Registration successful. Please login.");
        exit;
        
    } catch (PDOException $e) {
        header("Location: registration.html?error=Database error: " . urlencode($e->getMessage()));
        exit;
    }
}

// Redirect if accessed directly
header("Location: registration.html");
exit;
?>