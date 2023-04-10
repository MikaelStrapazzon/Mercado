<?php

namespace Http\Controller;

use Entity\tax as TaxEntity;
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

    public function create(): array
    {
        $newTax = new TaxEntity(
            0,
            $_POST['acronym'] ?? null,
            $_POST['name'] ?? null,
            $_POST['default_percentage_value'] ?? null,
        );

        return $this->taxService->create($newTax);
    }
}