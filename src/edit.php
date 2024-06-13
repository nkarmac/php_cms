<?php
include 'functions/auth.php';
include 'functions/content.php';

if (!is_logged_in()) {
    header('Location: login.php');
    exit;
}

$id = $_GET['id'];
$article = get_article($id);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $body = $_POST['body'];
    if (update_article($id, $title, $body)) {
        header('Location: dashboard.php');
        exit;
    } else {
        $error = "Failed to update article.";
    }
}
?>
<?php include 'templates/header.php'; ?>
<h2>Edit Article</h2>
<?php if (isset($error)): ?>
    <p style="color: red;"><?= $error ?></p>
<?php endif; ?>
<form action="edit.php?id=<?= $id ?>" method="post">
    <label for="title">Title</label>
    <input type="text" name="title" id="title" value="<?= htmlspecialchars($article['title']) ?>" required>
    <label for="body">Body</label>
    <textarea name="body" id="body" required><?= htmlspecialchars($article['body']) ?></textarea>
    <button type="submit">Update</button>
</form>
<?php include 'templates/footer.php'; ?>