<?php
require 'db_connect.php';

// Fetch all tasks
$result = $conn->query("SELECT * FROM todos ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Simple ToDo App</title>
    <style>
        body { font-family: Arial; margin: 40px; }
        .completed { text-decoration: line-through; color: gray; }
        li { margin-bottom: 10px; }
        a { margin-left: 10px; }
    </style>
</head>
<body>
    <h2>ToDo List</h2>

    <form action="add_todo.php" method="POST">
        <input type="text" name="task" placeholder="Enter new task..." required>
        <input type="submit" value="Add">
    </form>

    <ul>
        <?php while ($row = $result->fetch_assoc()): ?>
            <li>
                <span class="<?= $row['is_complete'] ? 'completed' : '' ?>">
                    <?= htmlspecialchars($row['task']) ?>
                </span>

                <!-- Toggle complete/incomplete -->
                <a href="toggle_complete.php?id=<?php $row['id'] ?>">
                    [<?= $row['is_complete'] ? 'Undo' : 'Complete' ?>]
                </a>~

                <!-- Delete task -->
                <a href="delete_todo.php?id=<?= $row['id'] ?>" onclick="return confirm('Delete this task?')">
                    [Delete]
                </a>
                <!-- Edit task -->

                <a href="edit_todo.php?id=<?= $row['id'] ?>">
                    [Edit]
                </a>
            </li>
        <?php endwhile; ?>
    </ul>
</body>
</html>

<?php $conn->close(); ?>
