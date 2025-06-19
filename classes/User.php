<?php
class User {
    private $email;
    private $password;
    private static $file = __DIR__ . 'users.txt';

    public function __construct($email, $password) {
        $this->email = trim($email);
        $this->password = trim($password);
    }

    public function save() {
        $data = [
            'email' => $this->email,
            'password' => $this->password
        ];
        file_put_contents(self::$file, json_encode($data) . PHP_EOL, FILE_APPEND);
    }

    public static function exists($email) {
        $users = self::getAll();
        foreach ($users as $user) {
            if ($user['email'] === $email) {
                return true;
            }
        }
        return false;
    }

    public static function authenticate($email, $password) {
        $users = self::getAll();
        foreach ($users as $user) {
            if ($user['email'] === $email && $user['password'] === $password) {
                return true;
            }
        }
        return false;
    }

    public static function getAll() {
        if (!file_exists(self::$file)) return [];
        $lines = file(self::$file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        $users = [];
        foreach ($lines as $line) {
            $users[] = json_decode($line, true);
        }
        return $users;
    }
}
