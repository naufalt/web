<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Library - Home</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <header>
        <h1>Welcome, <?php echo $user; ?>!</h1>
        <nav>
            <ul>
                <li><a href="profile.php">Profile</a></li>
                <li><a href="search.php">Search Books</a></li>
                <li><a href="borrow.php">Borrow Book</a></li>
                <li><a href="return.php">Return Book</a></li>
                <li><a href="history.php">History</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <h2>Library Home</h2>
        <p>Welcome to the e-library system.</p>
    </main>
    <footer>
        <p>&copy; 2023 Library</p>
    </footer>
</body>
</html>
