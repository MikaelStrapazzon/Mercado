<?php
require_once "system/autoloader.php";
require_once "configs.php";

use Http\Controller\Test;
use Http\dto\response;
use System\Object\route;
use system\Routes;

$routes = new Routes([
    new route('static', 'GET', Test::class, "staticReturn"),
    new route('static/{id}', 'GET', Test::class, "pathVariable"),
]);

try {
    $data = $routes->processRequest();
    echo json_encode(new response(200, null, $data));
}
catch (Exception $e) {
    echo json_encode(new response($e->getCode(), $e->getMessage()));
}