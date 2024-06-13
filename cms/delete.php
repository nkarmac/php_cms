<?php
include 'functions/auth.php';
include 'functions/content.php';

if (!is_logged_in()) {
    header('Location: login.php');
    exit;
}

$id = $_GET['id'];
if (delete_article($id)) {
    header('Location: dashboard.php');
    exit;
} else {
    echo "Failed to delete article.";
}
?>