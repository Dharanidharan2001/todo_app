<?php
require 'includes/config.php';
require 'includes/functions.php';
redirectIfNotLoggedIn();

$task_id = $_GET['id'];
$sql = "DELETE FROM tasks WHERE id = $task_id";

if ($conn->query($sql) === TRUE) {
    header('Location: tasks.php');
    exit;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>
