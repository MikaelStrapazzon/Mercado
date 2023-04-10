<?php

namespace System\Database;

use PDO;

abstract class repository_default extends connection {
    protected string $table;

    public function findAll(): array {
        $bind = $this->connection->query("SELECT * FROM " . $this->table);
        return $bind->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create(object $object) {
        $attributes = get_object_vars($object);
        if (isset($attributes['id']))
            unset($attributes['id']);

        $query = "INSERT INTO " . $this->table . "(" . implode(",", array_keys($attributes)) . ") VALUES (";

        foreach ($attributes as $value)
            $query .= "?,";
        $query = substr($query, 0, -1) . ")";

        $operation = $this->connection->prepare($query);

        $count = 1;
        foreach ($attributes as &$value)
            $operation->bindParam($count++, $value);

        $operation->execute();

        return $operation->fetch();
    }
}