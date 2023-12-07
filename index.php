<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Список сообщений</title>
</head>
<body>
    <?php
    require 'config.php';
    require 'functions.php';

    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $messages = getMessages($page);

    foreach ($messages as $message) {
        echo '<div>';
        echo '<h2>' . $message['title'] . '</h2>';
        echo '<p>' . $message['content_short'] . '</p>';
        echo '<a href="view.php?id=' . $message['id'] . '">Просмотреть</a>';
        
        echo ' <a href="edit_message.php?id=' . $message['id'] . '">Редактировать</a>';
        
        echo '</div>';
    }

    echo '<div style="margin-top: 1em;">';
    echo ' <a href="create_message.php">Создать новое сообщение</a>';
    echo '</div>';

    ?>
</body>
</html>
