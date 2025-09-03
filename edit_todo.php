<?php
require 'db_connect.php';

if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $result = $conn->query("SELECT * FROM todos WHERE id = $id");
    $row = $result->fetch_assoc();
}

if (!empty($_POST['task'])) {
    $task = $conn->real_escape_string($_POST['task']);
    $conn->query("UPDATE todos SET task = '$task' WHERE id = $id");
    header("Location: index.php");
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit ToDo</title>
</head>
<body>
    <h1>Edit Todo</h1>

<form action="edit_todo.php?id=<?= $id ?>" method="POST">
    <input type="text" name="task" value="<?php echo htmlspecialchars($row['task']); ?>" placeholder="Enter new task..." required>
    <input type="submit" value="Update">
</form>


</body>

<?php
$conn->close();
exit();
?>