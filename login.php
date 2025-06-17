<?php
require_once 'classes/User.php';

$user = new User();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($user->login($_POST['username'], $_POST['password'])) {
        header("Location: dashboard.php");
        exit;
    } else {
        echo "Login failed.";
    }
}
?>