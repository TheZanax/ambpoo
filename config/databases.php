<?php

class Database {
    private static $conn;

    public static function connect() {
        return self::$conn = self::$conn ?? new PDO("mysql:host=localhost;dbname=abmpoo", "root", "");
    }
}
?>
