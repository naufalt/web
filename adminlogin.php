<?php
session_start();
include("config.php");
if (isset($_SESSION['user'])) {
	header("Location: index.php");
	exit();
}

// Check login credentials
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$username = $_POST['username'];
	$password = $_POST['password'];

	$sql = "SELECT * FROM admin WHERE Username = '$username' AND Passsword = '$password'";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		// Authentication success
		$_SESSION['user'] = $username;
		header("Location: admindex.php");
		exit();
	} else {
		// Authentication failed
		$error_message = "Invalid username or password.";
	}
}
?>

<!DOCTYPE html>
<html>

<head>
	<title>Library - Login Admin</title>
	<link rel="stylesheet" type="text/css" href="css/loginstyle.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
	<img class="wave" src="img/wave.png">
	<div class="container">
		<div class="img">
			<img src="img/loginillustration.svg">
		</div>
		<div class="login-content">
			<form action="" method="POST">
				<img src="img/Logo.png">
				<h2 class="title">Welcome Admin</h2>
				<div class="input-div one">
					<div class="i">
						<i class="fas fa-user"></i>
					</div>
					<div class="div">
						<h5>Username</h5>
						<input type="text" class="input" id="username" name="username" required>
					</div>
				</div>
				<div class="input-div pass">
					<div class="i">
						<i class="fas fa-lock"></i>
					</div>
					<div class="div">
						<h5>Password</h5>
						<input type="password" class="input" id="password" name="password" required">
					</div>
				</div>
				<a class="admlgn" href="login.php">Login Sebagai User</a>
				<input type="submit" class="btn" value="Login">
			</form>
			<?php if (isset($error_message)) : ?>
				<p class="error"><?php echo $error_message; ?></p>
			<?php endif; ?>
		</div>
	</div>
	<script type="text/javascript" src="js/main.js"></script>
</body>

</html>