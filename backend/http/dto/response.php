<?php

namespace Http\dto;

class response {
    public int $code;
    public string|null $error;
    public array $data;

    /**
     * @param int $code
     * @param string|null $error
     * @param array $data
     */
    public function __construct(int $code, string $error = null, array $data = [])
    {
        $this->code = $code;
        $this->error = $error;
        $this->data = $data;
    }


}