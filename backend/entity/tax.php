<?php

namespace Entity;

class tax {
    public int $id;
    public string $acronym;
    public string $name;
    public float $default_percentage_value;

    /**
     * @param int $id
     * @param string $acronym
     * @param string $name
     * @param float $default_percentage_value
     */
    public function __construct(int $id, string $acronym, string $name, float $default_percentage_value)
    {
        $this->id = $id;
        $this->acronym = $acronym;
        $this->name = $name;
        $this->default_percentage_value = $default_percentage_value;
    }

}