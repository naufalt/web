<?php
session_start();
include("config.php");
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
$user = $_SESSION['user'];

// Fetch user profile
$sql = "SELECT * FROM admin WHERE Username = '$user'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $fullname = $row['nama'];
    $email = $row['email'];
    $jn_kelamin = $row['jn_kelamin'];
    $alamat = $row['alamat'];
    $tggl_lahir = $row['tggl_lahir'];
} else {
    // Handle error if user profile not found
    $fullname = 'N/A';
    $email = 'N/A';
    $jn_kelamin = 'N/A';
    $alamat = 'N/A';
    $tggl_lahir = 'N/A';
}

$conn->close();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Admin - Profile</title>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/profilestyle.css">
</head>

<body>
    <main>
        <div class="big-wrapper light">
            <header>
                <div class="container">
                    <div class="logo">
                        <img src="img/smalllogo2.png" alt="Logo" />
                        <h3>GEDEBOOK</h3>
                    </div>
                    <div class="links">
                        <ul>
                            <li><a href="admsearch.php">Search Books</a></li>
                            <li><a href="user.php">User</a></li>
                            <li><a href="admreq_history.php">Requested</a></li>
                            <li><a href="admhistory.php">History</a></li>
                            <li><a href="admprofile.php">Profile</a></li>
                            <!--<li><a href="logout.php" class="btn">Log Out</a></li>-->
                        </ul>
                    </div>
                    <div class="overlay"></div>
                    <div class="hamburger-menu">
                        <div class="bar"></div>
                    </div>
                </div>
            </header>
            <section class="py-5 my-5">
                <div class="container2">
                    <div class="bg-white shadow rounded-lg d-block d-sm-flex container">
                        <div class="tab-pane" id="account" role="tabpanel" aria-labelledby="account-tab">
                            <h3 class="mb-4">Profile Details</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" class="form-control" value="<?php echo $user; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" class="form-control" value="<?php echo $fullname; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" class="form-control" value="<?php echo $email; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Sex</label>
                                        <input type="text" class="form-control" value="<?php echo $jn_kelamin; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="text" class="form-control" value="<?php echo $alamat; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Date of Birth</label>
                                        <input type="text" class="form-control" value="<?php echo $tggl_lahir; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="cta">
                                <a href="logout.php" class="btn">Log Out</a>
                            </div>
                        </div>
                        <div>
                        </div>
            </section>
    </main>
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <script src="js/profile.js"></script>
</body>

</html>