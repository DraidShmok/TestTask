<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Создать сообщение</title>
</head>
<body>
    <?php
    require 'config.php';
    require 'functions.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $title = $_POST['title'];
        $author = $_POST['author'];
        $contentShort = $_POST['content_short'];
        $contentFull = $_POST['content_full'];

        addMessage($title, $author, $contentShort, $contentFull);

        header("Location: index.php");
        exit();
    }
    ?>

    <div>
     <a href="index.php">На главную</a>
    </div>

    <h2>Создать сообщение</h2>

    <form action="create_message.php" method="post">
        <label for="title">Заголовок:</label>
        <input type="text" name="title" required>
        <br>
        <label for="author">Автор:</label>
        <input type="text" name="author" required>
        <br>
        <label for="content_short">Краткое содержание:</label>
        <textarea name="content_short" required></textarea>
        <br>
        <label for="content_full">Полное содержание:</label>
        <textarea name="content_full" required></textarea>
        <br>
        <input type="submit" value="Создать сообщение">
    </form>
</body>
</html>
