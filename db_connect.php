<?php
$host = 'localhost';
$user = 'root';       // change if needed
$password = '';       // change if needed
$dbname = 'john_doe';

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
