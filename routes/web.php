<?php

require __DIR__ . '/../app/Controllers/AboutController.php';
require __DIR__ . '/../app/Controllers/HomeController.php';
require __DIR__ . '/../app/Controllers/LinkController.php';
require __DIR__ . '/../app/Controllers/PostController.php';

$routes->get('/',  [HomeController::class,'index']);
$routes->get('/about',  [AboutController::class,'index']);
$routes->get('/post',  [PostController::class,'show']);

$routes->get('/links',  [LinkController::class,'index']);
$routes->get('/links/create',  [LinkController::class,'create']);
$routes->get('/links/store',  [LinkController::class,'store']);

