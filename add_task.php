<?php
require 'includes/config.php';
require 'includes/functions.php';
redirectIfNotLoggedIn();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $conn->real_escape_string($_POST['title']);
    $description = $conn->real_escape_string($_POST['description']);
    $user_id = $_SESSION['user_id'];

    $sql = "INSERT INTO tasks (user_id, title, description) VALUES ($user_id, '$title', '$description')";

    if ($conn->query($sql) === TRUE) {
        header('Location: tasks.php');
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<?php include 'includes/header.php'; ?>
<div class="container">
    <h2>Add Task</h2>
    <form method="post">
        <input type="text" name="title" placeholder="Task Title" required>
        <textarea name="description" placeholder="Task Description"></textarea>
        <button type="submit">Add Task</button>
    </form>
</div>
</body>
</html>
