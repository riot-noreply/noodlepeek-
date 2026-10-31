<?php
require 'config.php';
require 'lang.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$id = $_GET['id'];
$user_id = $_SESSION['user_id'];
$query = "SELECT * FROM tasks WHERE id='$id' AND user_id='$user_id'";
$result = mysqli_query($conn, $query);
$task = mysqli_fetch_assoc($result);
$query = "SELECT * FROM tasks WHERE id='$id'";
$result = mysqli_query($conn, $query);
$task = mysqli_fetch_assoc($result);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $task_name = htmlspecialchars($_POST['task_name']);
    $status = $_POST['status'];
    
    if (!empty($task_name)) {
        $user_id = $_SESSION['user_id'];
        $update_query = "UPDATE tasks SET task_name='$task_name', status='$status' WHERE id='$id' AND user_id='$user_id'";
        mysqli_query($conn, $update_query);
        header("Location: dashboard.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title><?= __('edit'); ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="header-bar">
            <h2><?= __('edit'); ?></h2>
            <div><a href="dashboard.php">Kembali</a></div>
        </div>

        <div class="card">
            <form method="POST" action="">
                <label><?= __('task_name'); ?></label>
                <input type="text" name="task_name" value="<?= $task['task_name']; ?>" required>
                
                <label><?= __('status'); ?></label>
                <select name="status">
                    <option value="not_started" <?= $task['status'] == 'not_started' ? 'selected' : ''; ?>><?= __('not_started'); ?></option>
                    <option value="pending" <?= $task['status'] == 'pending' ? 'selected' : ''; ?>><?= __('pending'); ?></option>
                    <option value="completed" <?= $task['status'] == 'completed' ? 'selected' : ''; ?>><?= __('completed'); ?></option>
                    <option value="cancel" <?= $task['status'] == 'cancel' ? 'selected' : ''; ?>><?= __('cancel'); ?></option>
                    <option value="reschedule" <?= $task['status'] == 'reschedule' ? 'selected' : ''; ?>><?= __('reschedule'); ?></option>
                </select>
                
                <button type="submit" style="margin-top:15px;"><?= __('save'); ?></button>
            </form>
        </div>
    </div>
</body>
</html>