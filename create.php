<?php
session_start();

if (!isset($_SESSION['is_logged_in']) || $_SESSION['is_logged_in'] !== true) {
    header('Location: login.php');
    exit;
}

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $task = trim($_POST['task'] ?? '');

    if ($task !== '') {
        $message = 'Завдання успішно створено!';
    } else {
        $message = 'Введіть назву завдання.';
    }
}
?>
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Створення завдання</title>
</head>
<body>
    <h1>Створення завдання</h1>

    <?php if ($message !== ''): ?>
        <p><?= htmlspecialchars($message, ENT_QUOTES, 'UTF-8') ?></p>
    <?php endif; ?>

    <form method="POST" action="create.php">
        <label>Назва завдання:</label>
        <input type="text" name="task" required>
        <button type="submit">Створити</button>
    </form>

    <a href="index.php">На головну</a>
</body>
</html>