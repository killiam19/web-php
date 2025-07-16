<?php

$title='Proyectos';

$dsn ='mysql:host=127.0.0.1;dbname=web-php;charset=utf8mb4';
$pdo = new PDO($dsn,'root','1213123Shape');

$links = $pdo->query('SELECT*FROM links ORDER BY id DESC')->fetchAll(PDO::FETCH_ASSOC);

require __DIR__. '/../../resources/links.template.php';