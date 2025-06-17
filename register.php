<?php
require_once 'classes/User.php';

$user = new User();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email    = $_POST['email'];
    $password = $_POST['password'];
    $confirm  = $_POST['confirm_password'];

    if ($password !== $confirm) {
        die("Passwords do not match!");
    }

    if ($user->register($username, $email, $password)) {
        header("Location: login.html");
    } else {
        echo "Registration failed.";
    }
}
?>