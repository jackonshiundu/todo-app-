<?php
require 'db_connect.php';

if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];

    // Toggle is_complete: 1 => 0, 0 => 1
    $conn->query("UPDATE todos SET is_complete = NOT is_complete WHERE id = $id");
}

$conn->close();
header("Location: index.php");
exit();
