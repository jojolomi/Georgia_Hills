<?php
session_start();
require_once 'classes/User.php';

$email = trim($_POST['email'] ?? '');
$password = trim($_POST['password'] ?? '');

if (!$email || !$password) {
    header("Location: login.php?error=Please fill in both fields");
    exit;
}

if (User::authenticate($email, $password)) {
    $_SESSION['user'] = ['email' => $email];
    setcookie('email', $email, time() + 86400 * 7, "/");
    header("Location: login.php?success=Logged in successfully");
    exit;
} else {
    header("Location: login.php?error=Invalid email or password");
    exit;
}
