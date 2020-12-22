<?php

use Denis\MVC\Controllers\CursosControllers;

$routes = [
    'GET' => [
        '/cursos' => [CursosControllers::class, 'index'],
        '/cursos/novo' => [CursosControllers::class, 'create'],
        '/cursos/delete' => [CursosControllers::class, 'destroy'],
        '/cursos/update' => [CursosControllers::class, 'edit'],
    ],
    'POST' => [
        '/cursos/novo' => [CursosControllers::class, 'store'],
        '/cursos/update' => [CursosControllers::class, 'update'],
    ],
    'DELETE' => [
    ]

];
return $routes;