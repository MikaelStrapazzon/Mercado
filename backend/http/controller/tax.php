<?php

namespace Http\Controller;

use service\tax as taxService;

class tax {

    private taxService $taxService;

    public function __construct() {
        $this->taxService = new taxService();
    }

    public function getAll(): array
    {
        return $this->taxService->findAll();
    }

    public static function pathVariable($id): string
    {
        return "Hello World: " . $id;
    }
}