<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
$user = $_SESSION['user'];

// Handle search form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $searchTerm = $_POST['searchTerm'];
    
    // Perform book search based on the search term
    // ...

    // Display search results
    // ...
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Library - Search</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <header>
        <h1>Welcome, <?php echo $user; ?>!</h1>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="profile.php">Profile</a></li>
                <li><a href="borrow.php">Borrow Book</a></li>
                <li><a href="return.php">Return Book</a></li>
                <li><a href="history.php">History</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <h2>Search Books</h2>
        <form action="" method="POST">
            <input type="text" name="searchTerm" placeholder="Enter book title or author">
            <button type="submit">Search</button>
        </form>
        <!-- Display search results here -->
    </main>
    <footer>
        <p>&copy; 2023 Library</p>
    </footer>
</body>
</html>
