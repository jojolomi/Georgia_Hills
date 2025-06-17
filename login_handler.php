<?php
session_start();
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    try {
        $conn = DB::connect();
        $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user'] = [
                'id' => $user['id'],
                'username' => $user['username'],
                'email' => $user['email']
            ];
            header("Location: dashboard.php");
            exit;
        } else {
            header("Location: login.html?error=Invalid username or password");
            exit;
        }
    } catch (PDOException $e) {
        header("Location: login.html?error=Database error: " . urlencode($e->getMessage()));
        exit;
    }
}

header("Location: login.html");
exit;
?>