<?php
require_once "system/autoloader.php";
require_once "system/cors.php";
require_once "configs.php";

use Http\Controller\Tax;
use Http\dto\response;
use System\Object\route;
use system\Routes;

$routes = new Routes([
    new route('tax', 'GET', Tax::class, "getAll"),
    new route('tax', 'POST', Tax::class, "create")
]);

try {
    $data = $routes->processRequest();
    echo json_encode(new response(200, null, $data));
}
catch (Exception $e) {
    echo json_encode(new response($e->getCode(), $e->getMessage()));
}