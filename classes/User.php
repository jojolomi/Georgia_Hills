<?php
require_once __DIR__ . '/../db.php';

class User {
    private $conn;

    public function __construct() {
        $this->conn = DB::connect();
        session_start();
    }

    public function register($username, $email, $password) {
        $hash = password_hash($password, PASSWORD_BCRYPT);
        $stmt = $this->conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        return $stmt->execute([$username, $email, $hash]);
    }

    public function login($username, $password) {
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);
        $user = $stmt->fetch();
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user'] = $user;
            setcookie("last_login", date("Y-m-d H:i:s"), time() + 3600);
            return true;
        }
        return false;
    }

    public function isLoggedIn() {
        return isset($_SESSION['user']);
    }

    public function getUser() {
        return $_SESSION['user'] ?? null;
    }

    public function logout() {
        session_destroy();
        setcookie("last_login", "", time() - 3600);
    }
}
?>