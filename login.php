<?php
require 'config.php';
require 'lang.php';

if (isset($_SESSION['user_id'])) {
    header("Location: dashboard.php");
    exit;
}

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = htmlspecialchars($_POST['username']);
    $password = md5($_POST['password']);

    if (empty($username) || empty($password)) {
        $error = __('error_empty');
    } else {
        $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            header("Location: dashboard.php");
            exit;
        } else {
            $error = __('error_login');
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title><?= __('login'); ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="header-bar">
            <h2>Noodle Peek! - <?= __('login'); ?></h2>
            <div>
                <a href="?lang=id">ID</a> | <a href="?lang=en">EN</a>
            </div>
        </div>

        <div class="card">
            <?php if($error != "") echo "<p style='color:#f28b82;'>$error</p>"; ?>
            <form method="POST" action="">
                <label><?= __('username'); ?></label>
                <input type="text" name="username" required>
                
                <label><?= __('password'); ?></label>
                <input type="password" name="password" required>
                
                <button type="submit"><?= __('login'); ?></button>
            </form>
            <br>
            <a href="register.php"><?= __('no_account'); ?></a>
        </div>
    </div>
</body>
</html>