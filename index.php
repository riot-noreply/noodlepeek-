<?php
require 'lang.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title><?= __('hero_title'); ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="hero-bg">
        <div class="dot dot1"></div>
        <div class="dot dot2"></div>
        <div class="dot dot3"></div>
    </div>

    <div class="container" style="max-width: 800px;">
        <div class="header-bar">
            <div></div>
            <div>
                <a href="?lang=id">ID</a> | <a href="?lang=en">EN</a>
            </div>
        </div>
        
        <div class="hero-content">
            <h1><?= __('hero_title'); ?></h1>
            <p><?= __('hero_desc'); ?> <span class="motto-small"><?= __('hero_desc_small'); ?></span></p>
            <div class="btn-group">
                <a href="login.php"><button><?= __('login'); ?></button></a>
                <a href="register.php"><button class="btn-outline"><?= __('register'); ?></button></a>
            </div>
        </div>
    </div>
</body>
</html>