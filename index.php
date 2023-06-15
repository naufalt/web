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
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" type="text/css" href="css/indexstyle.css">
</head>

<body>
  <!--<header>
        <h1>Welcome, </h1>
        <nav>
            <ul>
                <li><a href="profile.php">Profile</a></li>
                <li><a href="search.php">Search Books</a></li>
                <li><a href="admreq_history.php">Requested</a></li>
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
    </footer>-->
  <main>
    <div class="big-wrapper light">
      <!--<img src="img/books.png" alt="" class="shape" />-->

      <header>
        <div class="container">
          <div class="logo">
            <img src="img/smalllogo.png" alt="Logo" />
            <h3>GEDEBOOK</h3>
          </div>

          <div class="links">
            <ul>
              <li><a href="search.php">Search Books</a></li>
              <li><a href="req_history.php">Requested</a></li>
              <li><a href="history.php">History</a></li>
              <li><a href="profile.php">Profile</a></li>
              <!--<li><a href="logout.php" class="btn">Log Out</a></li>-->
            </ul>
          </div>

          <div class="overlay"></div>

          <div class="hamburger-menu">
            <div class="bar"></div>
          </div>
        </div>
      </header>

      <div class="showcase-area">
        <div class="container">
          <div class="left">
            <div class="big-title">
              <h1>Welcome, <?php echo $user; ?></h1>
              <h2>Let's Get and Trade Your Book Now!</h2>
            </div>
            <p class="text">
              Discover the book you want to get and trade it with your own.
              <br />In our library, we believe in the power of exchanging
              <br />knowledge and experiences.
            </p>
            <div class="cta">
              <a href="search.php" class="btn">Search Books</a>
            </div>
          </div>

          <div class="right">
            <!--<img src="img/welcomeindex.svg" alt="Person Image" class="person" />-->
          </div>
        </div>
      </div>

      <div class="bottom-area">
        <div class="container">
          <button class="toggle-btn">
            <i class="far fa-moon"></i>
            <i class="far fa-sun"></i>
          </button>
        </div>
      </div>
    </div>
  </main>

  <!-- JavaScript Files -->

  <script src="https://kit.fontawesome.com/a81368914c.js"></script>
  <script src="js/index.js"></script>
</body>

</html>