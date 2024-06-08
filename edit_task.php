<?php
require 'includes/config.php';
require 'includes/functions.php';
redirectIfNotLoggedIn();

$task_id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $conn->real_escape_string($_POST['title']);
    $description = $conn->real_escape_string($_POST['description']);

    $sql = "UPDATE tasks SET title = '$title', description = '$description' WHERE id = $task_id";

    if ($conn->query($sql) === TRUE) {
        header('Location: tasks.php');
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    $sql = "SELECT * FROM tasks WHERE id = $task_id";
    $result = $conn->query($sql);
    $task = $result->fetch_assoc();
}
?>

<?php include 'includes/header.php'; ?>
<div class="container">
    <h2>Edit Task</h2>
    <form method="post">
        <input type="text" name="title" value="<?php echo $task['title']; ?>" required>
        <textarea name="description"><?php echo $task['description']; ?></textarea>
        <button type="submit">Update Task</button>
    </form>
</div>
</body>
</html>
