<?php

namespace System\Database;

abstract class repository_default extends connection {
    protected string $table;

    public function findAll(): array {
        $bind = $this->connection->query("SELECT * FROM " . $this->table);
        return $bind->fetchAll();
    }
}