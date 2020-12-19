<?php

use Denis\MVC\Controllers\CursosControllers;

$routes = [
    'GET' => [
        '/cursos' => [CursosControllers::class, 'index'],
        '/cursos/novo' => [CursosControllers::class, 'create']
    ],
    'POST' =>  [
        '/cursos/novo' => [CursosControllers::class, 'store']
    ],
   
];
return $routes;