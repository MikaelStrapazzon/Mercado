<?php

namespace Http\Controller;

class Test {
    public static function staticReturn(): string
    {
        return "Hello World";
    }

    public static function pathVariable($id): string
    {
        return "Hello World: " . $id;
    }
}