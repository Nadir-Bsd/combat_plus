<?php

final class Database
{
    private static ?PDO $pdo = null;

    public static function getConnection(): PDO
    {
        if (self::$pdo === null){
            try {
                $host = "localhost";
                $dbname = "combat_plus";
                $login = "nadir";
                $password = "Nadir42400.";

                self::$pdo = new PDO("mysql:host={$host};dbname={$dbname}" , $login, $password);
            } catch (PDOException $error) {
                echo "Erreur de connexion : " . $error->getMessage();
            }
        }

        return self::$pdo;
    }
}