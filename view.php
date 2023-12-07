<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Просмотр сообщения</title>
</head>
<body>
    <?php
    require 'config.php';
    require 'functions.php';

    $messageId = $_GET['id'];
    $message = getMessageById($messageId);
    $comments = getCommentsByMessageId($messageId);

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_comment'])) {
        $author = $_POST['author'];
        $content = $_POST['content'];

        addComment($messageId, $author, $content);

        header("Location: view.php?id=$messageId");
        exit();
    }
    ?>

     <div>
     <a href="index.php">На главную</a>
    </div>

    <h2><?php echo $message['title']; ?></h2>
    <p><?php echo nl2br($message['content_full']); ?></p>

    <h3>Комментарии:</h3>
    <?php
    foreach ($comments as $comment) {
        echo '<p><strong>' . $comment['author'] . '</strong>: ' . $comment['content'] . '</p>';
    }
    ?>

    <form action="view.php?id=<?php echo $messageId; ?>" method="post">
        <input type="hidden" name="add_comment" value="1">
        <label for="author">Ваше имя:</label>
        <input type="text" name="author" required>
        <br>
        <label for="content">Комментарий:</label>
        <textarea name="content" required></textarea>
        <br>
        <input type="submit" value="Добавить комментарий">
    </form>
    
</body>
</html>
