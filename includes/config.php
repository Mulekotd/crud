<?php

require_once __DIR__ . '../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '../');
$dotenv->load();

$dbConfig = [
    "host" => $_ENV['DB_HOST'],
    "port" => $_ENV['DB_PORT'],
    "dbname" => $_ENV['DB_DATABASE'],
    "user" => $_ENV['DB_USER'],
    "password" => $_ENV['DB_PASSWORD'],
];
?>