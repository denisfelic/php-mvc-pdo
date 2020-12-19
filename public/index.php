<?php

use Denis\MVC\Helpers\HttpListener;

require_once __DIR__ . '/../vendor/autoload.php';

$rotas = require_once __DIR__ . '/../config/routes.php';

$uri = $_SERVER['REQUEST_URI'];
$httpMethod = $_SERVER['REQUEST_METHOD'];
$validMethod = ['GET', 'POST', 'PUT', 'DELETE'];

methodIsValid($httpMethod, $validMethod);

$httpListener = new HttpListener();
$httpListener->listen($uri, $httpMethod, $rotas);




/**
 * @param $httpMethod
 * @param array $validMethod
 */
function methodIsValid($httpMethod, array $validMethod): void
{
    if (!in_array($httpMethod, $validMethod)) {
        echo 'Oops! erro 404';
        die();
    }
}
