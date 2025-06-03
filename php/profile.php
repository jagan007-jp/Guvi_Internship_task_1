<?php
require 'db_mongo.php';
require 'db_redis.php';

$action = $_POST["action"];
$email = $_POST["email"];

if(!$email){
    header('Content-Type: text/plain');
    echo "Invalid session";
    exit;
}

if($action === "get"){
    $query = new MongoDB\Driver\Query(['email' => $email]);
    $rows = $mongo->executeQuery("guvi_db.profiles",$query);
    $profile = current($rows->toArray());
    header('Content-Type: application/json');
    echo json_encode($profile);
}

if($action === "post"){
    $name = $_POST["name"];
    $age = (int)$_POST["age"];
    $dob = $_POST["dob"];
    $contact = $_POST["contact"];
    $bulk = new MongoDB\Driver\BulkWrite;
    $bulk->update(
        ['email' => $email],
        ['email' => $email, 'name' => $name, 'age' => $age, 'dob' => $dob, 'contact'=>$contact],
        ['upsert' => true]
    );
    $mongo->executeBulkWrite('guvi_db.profiles',$bulk);
    header('Content-Type: text/plain');
    echo "Profile updated successfully";
    
}
