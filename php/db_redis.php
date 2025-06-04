<?php
require __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();


$redis = new Redis();
$redis->connect($_ENV['REDIS_HOST'],$_ENV['REDIS_PORT']);
?>