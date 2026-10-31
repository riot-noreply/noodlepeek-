<?php
require 'config.php';
require 'lang.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$id = $_SESSION['user_id'];
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['action_type']) && $_POST['action_type'] == 'change_password') {
        $new_password = htmlspecialchars($_POST['new_password']);
        if (!empty($new_password)) {
            $password_hashed = md5($new_password);
            $query = "UPDATE users SET password='$password_hashed' WHERE id='$id'";
            mysqli_query($conn, $query);
            $message = __('success_pass');
        }
    } elseif (isset($_POST['action_type']) && $_POST['action_type'] == 'delete_account') {
        $query = "DELETE FROM users WHERE id='$id'";
        mysqli_query($conn, $query);
        session_destroy();
        header("Location: index.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title><?= __('settings'); ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="header-bar">
            <h2><?= __('settings'); ?></h2>
            <div><a href="dashboard.php">Kembali</a></div>
        </div>

        <div class="card">
            <?php if($message != "") echo "<p style='color:#81c995;'>$message</p>"; ?>
            <form method="POST" action="">
                <input type="hidden" name="action_type" value="change_password">
                <label><?= __('username'); ?></label>
                <input type="text" value="<?= $_SESSION['username']; ?>" disabled>
                
                <label><?= __('new_password'); ?></label>
                <input type="password" name="new_password" required>
                
                <button type="submit" style="margin-top:15px;"><?= __('change_password'); ?></button>
            </form>
        </div>
        
        <div class="card" style="border-color: #f28b82;">
            <form method="POST" action="" onsubmit="return confirm('<?= __('confirm_delete'); ?>');">
                <input type="hidden" name="action_type" value="delete_account">
                <button type="submit" style="background-color:#f28b82; color:#202124;"><?= __('delete_account'); ?></button>
            </form>
        </div>
    </div>
</body>
</html>