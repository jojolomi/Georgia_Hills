<?php
print_r(PDO::getAvailableDrivers());

class DB
{
    private static $conn;

    public static function connect()
    {
        if (!self::$conn) {
            self::$conn = new PDO("sqlsrv:host=localhost;dbname=GeorgiaHillsDB;charset=utf8", "root", "Jojododo102009!");
            self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return self::$conn;
    }
}

?>