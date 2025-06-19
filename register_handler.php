<?php
require_once 'classes/User.php';

$email = trim($_POST['email'] ?? '');
$password = trim($_POST['password'] ?? '');
$confirm = trim($_POST['confirm_password'] ?? '');

if (!$email || !$password || !$confirm) {
    header("Location: register.php?error=All fields are required");
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: register.php?error=Invalid email format");
    exit;
}

if ($password !== $confirm) {
    header("Location: register.php?error=Passwords do not match");
    exit;
}

if (User::exists($email)) {
    header("Location: register.php?error=Email is already registered");
    exit;
}

$user = new User($email, $password);
$user->save();

header("Location: register.php?success=Registration successful! now move to the login page to log in");
exit;
