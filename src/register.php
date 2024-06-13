<?php
require_once 'functions/auth.php'; // Ensure auth functions are included

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password !== $confirm_password) {
        $error = "Passwords do not match.";
    } else {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        if (create_user($username, $hashed_password)) {
            header('Location: login.php');
            exit;
        } else {
            $error = "Failed to create user. Username might already be taken.";
        }
    }
}
?>
<?php include 'templates/header.php'; ?>
<h2>Register</h2>
<?php if (isset($error)): ?>
    <p style="color: red;"><?= $error ?></p>
<?php endif; ?>
<form action="register.php" method="post">
    <label for="username">Username</label>
    <input type="text" name="username" id="username" required>
    <label for="password">Password</label>
    <input type="password" name="password" id="password" required>
    <label for="confirm_password">Confirm Password</label>
    <input type="password" name="confirm_password" id="confirm_password" required>
    <button type="submit">Register</button>
</form>
<?php include 'templates/footer.php'; ?>