<?php
function getMessages($page = 1, $perPage = 5) {
    global $conn;

    $start = ($page - 1) * $perPage;
    $result = $conn->query("SELECT * FROM messages ORDER BY created_at DESC LIMIT $start, $perPage");

    $messages = [];
    while ($row = $result->fetch_assoc()) {
        $messages[] = $row;
    }

    return $messages;
}

function getMessageById($id) {
    global $conn;

    $id = $conn->real_escape_string($id);
    $result = $conn->query("SELECT * FROM messages WHERE id = $id");

    return $result->fetch_assoc();
}

function getCommentsByMessageId($messageId) {
    global $conn;

    $result = $conn->query("SELECT * FROM comments WHERE message_id = $messageId ORDER BY created_at DESC");

    $comments = [];
    while ($row = $result->fetch_assoc()) {
        $comments[] = $row;
    }

    return $comments;
}

function addMessage($title, $author, $contentShort, $contentFull) {
    global $conn;

    $title = $conn->real_escape_string($title);
    $author = $conn->real_escape_string($author);
    $contentShort = $conn->real_escape_string($contentShort);
    $contentFull = $conn->real_escape_string($contentFull);

    $conn->query("INSERT INTO messages (title, author, content_short, content_full) VALUES ('$title', '$author', '$contentShort', '$contentFull')");
}

function updateMessage($id, $title, $contentShort, $contentFull) {
    global $conn;

    $id = $conn->real_escape_string($id);
    $title = $conn->real_escape_string($title);
    $contentShort = $conn->real_escape_string($contentShort);
    $contentFull = $conn->real_escape_string($contentFull);

    $conn->query("UPDATE messages SET title = '$title', content_short = '$contentShort', content_full = '$contentFull' WHERE id = $id");
}

function addComment($messageId, $author, $content) {
    global $conn;

    $messageId = $conn->real_escape_string($messageId);
    $author = $conn->real_escape_string($author);
    $content = $conn->real_escape_string($content);

    $conn->query("INSERT INTO comments (message_id, author, content) VALUES ($messageId, '$author', '$content')");
}
?>
