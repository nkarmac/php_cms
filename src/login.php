<?php
include 'functions/auth.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if (login($username, $password)) {
        header('Location: dashboard.php');
        exit;
    } else {
        $error = "Invalid username or password.";
    }
}
?>
<?php include 'templates/header.php'; ?>
<h2>Login</h2>
<?php if (isset($error)): ?>
    <p style="color: red;"><?= $error ?></p>
<?php endif; ?>
<form action="login.php" method="post">
    <label for="username">Username</label>
    <input type="text" name="username" id="username" required>
    <label for="password">Password</label>
    <input type="password" name="password" id="password" required>
    <button type="submit">Login</button>
</form>
<?php include 'templates/footer.php'; ?>