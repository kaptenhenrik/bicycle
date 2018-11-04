<?php

require '../app/bootstrap.php';

$request = new App\Request($_SERVER);
$routes = new App\Routes($request);
print_r($routes->handle());