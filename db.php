<?php
class DB {
    private static $conn;

    public static function connect() {
        if (!self::$conn) {
            try {
                $serverName = "localhost"; // or "localhost\SQLEXPRESS" if using Express
                $dbName = "GeorgiaHillsDB";
                $username = "your_sql_username";
                $password = "your_sql_password";

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
