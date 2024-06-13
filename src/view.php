<?php
require_once 'functions/auth.php'; // Ensure auth functions are included
require_once 'functions/content.php';

if (!is_logged_in()) {
    header('Location: login.php');
    exit;
}

$id = $_GET['id'];
$article = get_article($id);

if (!$article) {
    echo "Article not found.";
    exit;
}
?>
<?php include 'templates/header.php'; ?>
<h2><?= htmlspecialchars($article['title']) ?></h2>
<p><?= nl2br(htmlspecialchars($article['body'])) ?></p><br><br><br>
<p><small>Created on: <?= $article['date_created'] ?></small></p>
<a href="dashboard.php">Back to Dashboard</a>
<?php include 'templates/footer.php'; ?>