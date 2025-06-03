<?php
require 'db.php';
require 'db_redis.php';

$email = $_POST["email"];
$password = $_POST["password"];

$stmt = $conn->prepare("select id from users where email = ? and password = ?");
$stmt->bind_param('ss',$email,$password);
$stmt->execute();
$stmt->store_result();

if($stmt->num_rows > 0){
    $token = bin2hex(random_bytes(16));
    $redis->set("session:$token",$email);
    echo $email;
}else{
    echo "Invalid username or password";
}

$stmt->close();
$conn->close();
?>

