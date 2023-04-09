<?php
require_once "system/autoloader.php";

use System\Routes;
use System\Object\route;

use Http\Controller\Test;

$routes = new Routes([
    new route('static', 'GET', Test::class, "staticReturn"),
    new route('static/{id}', 'GET', Test::class, "pathVariable"),
]);

echo $routes->processRequest();