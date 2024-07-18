<?php

declare(strict_types=1);

class DatabaseConnector {
    // By making this method static we're able to call it without instantiating a DatabaseConnector object
    // You cannot just make any method static, it will only work if the method does not need to use $this
    public static function connect(): PDO
    {
        $db = new PDO('mysql:host=db;dbname=social', 'root', 'password');
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $db;
    }
}