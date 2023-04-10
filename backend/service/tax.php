<?php

namespace service;

use Entity\tax as TaxEntity;
use Repository\tax as taxRepository;

class tax
{
    private taxRepository $taxRepository;

    public function __construct(){
        $this->taxRepository = new taxRepository();
    }

    public function findAll(): array
    {
        return $this->taxRepository->findAll();
    }

    public function create(TaxEntity $newTax): array
    {
        return $this->taxRepository->create($newTax);
    }
}