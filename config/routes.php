<?php

use Denis\MVC\Controllers\CursosControllers;

$routes = [
    'GET' => [
        '/cursos' => [CursosControllers::class, 'index'],
        '/cursos/novo' => [CursosControllers::class, 'create'],
        '/cursos/delete' => [CursosControllers::class, 'destroy']
    ],
    'POST' =>  [
    '/cursos/novo' => [CursosControllers::class, 'store'],
],
    'DELETE' => [
]
   
];
return $routes;