<?php

namespace service;

use Repository\tax as taxRepository;

class tax
{
    public function findAll(): array
    {
        $repository = new taxRepository();
        return $repository->findAll();
    }
}