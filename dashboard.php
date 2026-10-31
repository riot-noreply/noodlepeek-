<?php
require 'config.php';
require 'lang.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $task_name = htmlspecialchars($_POST['task_name']);
    
    if (!empty($task_name)) {
        $user_id = $_SESSION['user_id'];
        $query = "INSERT INTO tasks (user_id, task_name, status) VALUES ('$user_id', '$task_name', 'not_started')";
        mysqli_query($conn, $query);
        header("Location: dashboard.php");
        exit;
    }
}
$user_id = $_SESSION['user_id'];
$result = mysqli_query($conn, "SELECT * FROM tasks WHERE user_id='$user_id' ORDER BY id DESC");
?>
<!DOCTYPE html>
<html>
<head>
    <title><?= __('dashboard'); ?></title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
</head>
<body>
    <div class="container" style="max-width: 700px;">
        <div class="header-bar">
            <h2>Noodle Peek!</h2>
            <div>
                <span><?= __('welcome'); ?>, <a href="setting.php"><?= $_SESSION['username']; ?></a></span> | 
                <a href="?lang=id">ID</a> | <a href="?lang=en">EN</a> | 
                <a href="logout.php"><?= __('logout'); ?></a>
            </div>
        </div>
        <div class="motto-text">
            <?= __('hero_desc'); ?> <span class="motto-small"><?= __('hero_desc_small'); ?></span>
        </div>

        <div class="card">
            <form method="POST" action="" style="display:flex; gap:10px;">
                <input type="text" name="task_name" placeholder="<?= __('task_name'); ?>" required style="margin:0;">
                <button type="submit" style="margin:0; white-space:nowrap;"><?= __('add_task'); ?></button>
            </form>
        </div>

        <div class="card">
            <table>
                <tr>
                    <th><?= __('task_name'); ?></th>
                    <th><?= __('status'); ?></th>
                    <th><?= __('action'); ?></th>
                </tr>
                <?php while($row = mysqli_fetch_assoc($result)) : ?>
                <tr>
                    <td><?= $row['task_name']; ?></td>
                    <td>
                        <span class="badge-<?= $row['status']; ?>">
                            <?= __($row['status']); ?>
                        </span>
                    </td>
                    <td>
                        <a href="edit.php?id=<?= $row['id']; ?>"><?= __('edit'); ?></a> | 
                        <a href="delete.php?id=<?= $row['id']; ?>" onclick="return confirmDelete();" style="color:#f28b82;"><?= __('delete'); ?></a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </table>
        </div>
    </div>
</body>
</html>