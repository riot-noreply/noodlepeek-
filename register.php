<?php
require 'config.php';
require 'lang.php';

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);
    if (empty($username) || empty($password)) {
        $message = __('error_empty');
    } else {
        $check_query = "SELECT * FROM users WHERE username='$username'";
        $check_result = mysqli_query($conn, $check_query);
        
        if (mysqli_num_rows($check_result) > 0) {
            $message = __('error_exist');
        } else {
            $password_hashed = md5($password);
            $query = "INSERT INTO users (username, password) VALUES ('$username', '$password_hashed')";
            if (mysqli_query($conn, $query)) {
                $message = __('success_reg');
            }
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title><?= __('register'); ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="header-bar">
            <h2>Noodle Peek! - <?= __('register'); ?></h2>
            <div>
                <a href="?lang=id">ID</a> | <a href="?lang=en">EN</a>
            </div>
        </div>

        <div class="card">
            <?php if($message != "") echo "<p style='color:#f28b82;'>$message</p>"; ?>
            <form method="POST" action="">
                <label><?= __('username'); ?></label>
                <input type="text" name="username" required>
                
                <label><?= __('password'); ?></label>
                <input type="password" name="password" required>
                
                <button type="submit"><?= __('register'); ?></button>
            </form>
            <br>
            <a href="login.php"><?= __('have_account'); ?></a>
        </div>
    </div>
</body>
</html>