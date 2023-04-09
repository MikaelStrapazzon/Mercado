<?php
    spl_autoload_register(function($class) {
        $path  = str_replace(
            "\\",
            "/",
            strtolower($class)
        ) . '.php';

        if (file_exists($path)) require_once $path;
    });