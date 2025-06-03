<?php
require 'db.php';

$email = $_POST['email'];
$password = $_POST['password'];

$stmt = $conn->prepare("select id from USERS where email = ?");
$stmt->bind_param('s',$email);
$stmt->execute();
$stmt->store_result();

if($stmt->num_rows > 0){
    echo "Email already registered";
    exit;
}

$stmt = $conn->prepare("insert into users(email, password) values(?,?)");
$stmt->bind_param('ss',$email,$password);
$stmt->execute();

echo $stmt->affected_rows>0? "success" : "Error in registering";
$stmt->close();
$conn->close();

?>