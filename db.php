<?php
class DB {
    private static $conn;

    public static function connect() {
        if (!self::$conn) {
            try {
                $serverName = "localhost";
                $dbName = "GeorgiaHillsDB";
                $username = "phpuser";
                $password = "Jojododo102009!";

                $dsn = "sqlsrv:Server=$serverName;Database=$dbName";
                self::$conn = new PDO($dsn, $username, $password);
                self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Database connection failed: " . $e->getMessage());
            }
        }
        return self::$conn;
    }
}
?>