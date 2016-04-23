<?php

class Database
{
    public static $dsn = 'mysql:host=localhost;dbname=airlinephp';
    public static $username = 'root';
    public static $password = '';

    private static $db;

    public static function getDB()
    {
        if(!isset(self::$db))
        {
            try
            {
                self::$db = new PDO(self::$dsn, self::$username, self::$password);
            }
            catch (PDOException $e)
            {
                $error_message = $e->getMessage();
                echo $error_message;
                exit();
            }
        }
        return self::$db;
    }
}