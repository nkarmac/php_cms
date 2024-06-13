<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/styles.css">
    <title>Pure PHP CMS</title>
</head>
<body>
    <header>
        <h1>Pure PHP CMS</h1>
        <?php if (is_logged_in()): ?>
            <nav>
                <a href="dashboard.php">Dashboard</a>
                <a href="logout.php">Logout</a>
            </nav>
        <?php else: ?>
            <nav>
                <a href="login.php">Login</a>
                <a href="register.php">Register</a>
            </nav>
        <?php endif; ?>
    </header>
    <main>