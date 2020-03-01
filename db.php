<?php

$mysqli = new mysqli('localhost', 'root', '', 'todo_list');
$task = '';
$update = false;
$error = "";


if (isset($_POST['submit'])) {
    $task = $_POST['task'];
    
    $mysqli->query("INSERT INTO tasks (task) VALUES('$task')");

    header("location: index.php");
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $mysqli->query("DELETE FROM tasks WHERE id=$id");

    header("location: index.php");
}

if (isset($_GET['edit'])) {
    $id = $_GET['edit']; 
    $update = true;
    $result = $mysqli->query("SELECT * FROM tasks WHERE id=$id");

    if ($result) {
        $row = $result->fetch_array();
        $task = $row['task'];
    }
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $task = $_POST['task'];

    $mysqli->query("UPDATE tasks SET task='$task' WHERE id=$id");

    header("location: index.php");
}

?>