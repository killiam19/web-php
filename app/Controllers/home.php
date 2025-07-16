<?php

$dsn ='mysql:host=127.0.0.1;dbname=web-php;charset=utf8mb4';
$pdo = new PDO($dsn,'root','1213123Shape');

$posts = $pdo->query('SELECT*FROM posts ORDER BY id DESC LIMIT 6')->fetchAll(PDO::FETCH_ASSOC);

require __DIR__. '/../../resources/home.template.php';