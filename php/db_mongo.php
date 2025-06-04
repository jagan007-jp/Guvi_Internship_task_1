<?php
require __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();


$mongo = new MongoDB\Driver\Manager($_ENV['MONGO_DB_URI']);
?>