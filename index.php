<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TODO list</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Shadows+Into+Light&display=swap" rel="stylesheet">
</head>
<body>
    <?php require_once 'db.php'; ?>

    <?php 
    $mysqli = new mysqli('localhost', 'root', '', 'todo_list');
    $result = $mysqli->query("SELECT * FROM tasks");
    ?>

    <?php
    function pre_r($array) {
        echo '<pre>';
        print_r($array);
        echo '</pre>';
    }
    ?>

    <div class="header">
        <h1>Your To-Do list</h1>
    </div>
    <form action="db.php" method="post">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <div class="task">
        <label>Task</label>
        <input type="text" required name="task" class="task-input" value = "<?php echo $task; ?>" placeholder="Add your task here">
        <?php if ($update == true): ?>
        <button type="submit" class="update-btn" name="update">Update</button>
        <?php else: ?>
        <button type="submit" class="task-btn" name="submit">Add task</button>
        <?php endif; ?>
        <hr>
    </form>
    </div>
    <div class="row">
        <table>
            <thead>
                <tr>
                    <th>NR</th>
                    <th>Task</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>

<?php 
    $i = 1; while($row = $result->fetch_assoc()): ?>
    <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $row['task']; ?></td>
        <td>
            <a href="index.php?edit=<?php echo $row['id']; ?>" class="edit-btn">Edit</a>
            <a href="db.php?delete=<?php echo $row['id']; ?>" class="delete-btn">Delete</a>
        </td>
    </tr>
    <?php  $i++; endwhile; ?>

        </table>
    </div>

</body>
</html>