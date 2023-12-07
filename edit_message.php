<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Редактировать сообщение</title>
</head>
<body>
    <?php
    require 'config.php';
    require 'functions.php';

    $messageId = $_GET['id'];
    $message = getMessageById($messageId);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $title = $_POST['title'];
        $contentShort = $_POST['content_short'];
        $contentFull = $_POST['content_full'];
        $author = $_POST['author'];

        updateMessage($messageId, $title, $contentShort, $contentFull, $author);

        header("Location: view.php?id=$messageId");
        exit();
    }
    ?>

    <div>
     <a href="index.php">На главную</a>
    </div>

    <h2>Редактировать сообщение</h2>

    <form action="edit_message.php?id=<?php echo $messageId; ?>" method="post">
        <label for="title">Заголовок:</label>
        <input type="text" name="title" value="<?php echo $message['title']; ?>" required>
        <br>
        <label for="author">Автор:</label>
        <input type="text" name="author" value="<?php echo $message['author']; ?>" required>
        <br>
        <label for="content_short">Краткое содержание:</label>
        <textarea name="content_short" required><?php echo $message['content_short']; ?></textarea>
        <br>
        <label for="content_full">Полное содержание:</label>
        <textarea name="content_full" required><?php echo $message['content_full']; ?></textarea>
        <br>
        <input type="submit" value="Сохранить изменения">
    </form>
</body>
</html>
