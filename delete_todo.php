<?php
require 'db_connect.php';

if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $conn->query("DELETE FROM todos WHERE id = $id");
}

$conn->close();
header("Location: index.php");
exit();
