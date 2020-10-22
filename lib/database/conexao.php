<?php

abstract class Conexao
{
    private static $conn;

    public static function getConn()
    {
        if (self::$conn == null) {
            try {
                self::$conn = new PDO('mysql: host=localhost; dbname=everis;', 'root', '');
                self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo 'ERROR: ' . $e->getMessage();
            }
        }

        return self::$conn;
    }
}
