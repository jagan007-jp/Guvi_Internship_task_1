<?php
require __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();


$conn = new mysqli($_ENV['HOST'],$_ENV['USER'],$_ENV['PASSWORD'],$_ENV['DB']);
if($conn->connect_error){
    die("Error connecting DB " . $conn->connect_error);
}
?>