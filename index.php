<?php
session_start();

$isLoggedIn = isset($_SESSION['is_logged_in'])
    && $_SESSION['is_logged_in'] === true;
?>
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Головна сторінка</title>
</head>
<body>
    <header>
        <?php if ($isLoggedIn): ?>
            Привіт, <?= htmlspecialchars($_SESSION['user_name'], ENT_QUOTES, 'UTF-8') ?>!
            <a href="logout.php">Вийти</a>
        <?php else: ?>
            Ви увійшли як Гість.
            <a href="login.php">Увійти</a>
        <?php endif; ?>
    </header>

    <h1>Головна сторінка</h1>

    <?php if ($isLoggedIn): ?>
        <a href="create.php">Створити завдання</a>
    <?php else: ?>
        <p>Увійдіть, щоб створювати завдання.</p>
    <?php endif; ?>
</body>
</html>