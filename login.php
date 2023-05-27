<?php
session_start();
if (isset($_SESSION['user'])) {
    header("Location: index.php");
    exit();
}

/* Check login credentials
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Perform authentication and set session
    if (/* authentication code ) {
        $_SESSION['user'] = $username;
        header("Location: index.php");
        exit();
    } else {
        $error_message = "Invalid username or password.";
    }
}*/
?>

<!DOCTYPE html>
<html>
<head>
    <title>Library - Login</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <header>
        <h1>Library Login</h1>
    </header>
    <main>
        <form action="" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Login</button>
        </form>
        <?php if (isset($error_message)): ?>
            <p class="error"><?php echo $error_message; ?></p>
        <?php endif; ?>
    </main>
    <footer>
        <p>&copy; 2023 Library</p>
    </footer>
</body>
</html>
