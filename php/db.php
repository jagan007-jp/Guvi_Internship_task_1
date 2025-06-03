<?php
$conn = new mysqli("127.0.0.1","root","","guvi_db");
if($conn->connect_error){
    die("Error connecting DB " . $conn->connect_error);
}
?>