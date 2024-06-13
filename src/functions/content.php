<?php
require_once __DIR__.'/../config/db.php';

function get_articles() {
    global $pdo;
    $stmt = $pdo->query("SELECT * FROM articles ORDER BY date_created DESC");
    return $stmt->fetchAll();
}

function get_article($id) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM articles WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch();
}

function create_article($title, $body) {
    global $pdo;
    $stmt = $pdo->prepare("INSERT INTO articles (title, body, date_created) VALUES (?, ?, NOW())");
    return $stmt->execute([$title, $body]);
}

function update_article($id, $title, $body) {
    global $pdo;
    $stmt = $pdo->prepare("UPDATE articles SET title = ?, body = ? WHERE id = ?");
    return $stmt->execute([$title, $body, $id]);
}

function delete_article($id) {
    global $pdo;
    $stmt = $pdo->prepare("DELETE FROM articles WHERE id = ?");
    return $stmt->execute([$id]);
}
?>