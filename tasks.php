<?php
require 'includes/config.php';
require 'includes/functions.php';
redirectIfNotLoggedIn();

$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM tasks WHERE user_id = $user_id";
$result = $conn->query($sql);
?>

<?php include 'includes/header.php'; ?>
<div class="container">
    <h2>My Tasks</h2>
    <a href="add_task.php">Add New Task</a>
    <ul>
        <?php while ($task = $result->fetch_assoc()): ?>
            <li>
                <strong><?php echo $task['title']; ?></strong>
                <p><?php echo $task['description']; ?></p>
                <a href="edit_task.php?id=<?php echo $task['id']; ?>">Edit</a>
                <a href="delete_task.php?id=<?php echo $task['id']; ?>">Delete</a>
            </li>
        <?php endwhile; ?>
    </ul>
</div>
</body>
</html>
