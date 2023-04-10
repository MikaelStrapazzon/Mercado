<?php

namespace System\Database;

use Exception;
use PDO;

class connection {
    protected PDO $connection;

    public function __construct()
    {
        try {
            $this->connection = new PDO("pgsql:host=". DB_HOST . ";dbname=" . DB_DATABASE_NAME, DB_USERNAME, DB_PASSWORD);
        }
        catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}