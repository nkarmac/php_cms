<?php
require_once 'functions/auth.php'; // Ensure auth functions are included
require_once 'functions/content.php';

if (!is_logged_in()) {
    header('Location: login.php');
    exit;
}

$articles = get_articles();
?>
<?php include 'templates/header.php'; ?>
<h2>Dashboard</h2>
<a href="create.php">Create New Article</a>
<table>
    <thead>
        <tr>
            <th>Title</th>
            <th>Date</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($articles as $article): ?>
            <tr>
                <td><a href="view.php?id=<?= $article['id'] ?>"><?= htmlspecialchars($article['title']) ?></a></td>
                <td><?= $article['date_created'] ?></td>
                <td>
                    <a href="edit.php?id=<?= $article['id'] ?>">Edit</a>
                    <a href="delete.php?id=<?= $article['id'] ?>">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php include 'templates/footer.php'; ?>