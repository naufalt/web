<?php
include('config.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Ambil data pengguna berdasarkan ID
    $sql = "SELECT * FROM anggota WHERE id_anggota = '$id'";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        die('Error: ' . mysqli_error($conn));
    }

    // Cek apakah data pengguna ditemukan
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $nama = $row['nama'];
        $username = $row['username'];
        $password = $row['password'];
        $jn_kelamin = $row['jn_kelamin'];
        $alamat = $row['alamat'];
        $email = $row['email'];
        $tgl_lahir = $row['tgl_lahir'];
    } else {
        echo "Data pengguna tidak ditemukan.";
        exit;
    }
} else {
    echo "ID pengguna tidak diberikan.";
    exit;
}

// Proses form ubah pengguna
if (isset($_POST['update'])) {
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $jn_kelamin = $_POST['jn_kelamin'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];
    $tgl_lahir = $_POST['tgl_lahir'];

    // Perbarui data pengguna
    $sql = "UPDATE anggota SET nama = '$nama', username = '$username', password = '$password', jn_kelamin = '$jn_kelamin', alamat = '$alamat', email = '$email', tgl_lahir = '$tgl_lahir' WHERE id_anggota = '$id'";
    $result = mysqli_query($conn, $sql);


    if ($result) {
        // Jika update berhasil, redirect ke halaman admsearch.php
        header("Location: user.php");
        exit();
    } else {
        // Jika terjadi kesalahan, tampilkan pesan error
        echo "Error: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>

<!doctype html>
<html lang="en">

<head>
    <title>Change User Data</title>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/uploadstyle.css">
</head>

<body>
    <main>
        <div class="big-wrapper light">
            <header>
                <div class="container2">
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
            <div class="container">
                <form method="post" action="">
                    <div class="row">
                        <div class="column">
                            <label for="nama">Nama:</label>
                            <input type="text" name="nama" value="<?php echo $nama; ?>" required>
                        </div>
                        <div class="column">
                            <label for="username">Username:</label>
                            <input type="text" name="username" value="<?php echo $username; ?>" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="column">
                            <label for="password">Password:</label>
                            <input type="password" name="password" value="<?php echo $password; ?>" required>
                        </div>
                        <div class="column">
                            <label for="jn_kelamin">Jenis Kelamin:</label>
                            <input type="text" name="jn_kelamin" value="<?php echo $jn_kelamin; ?>" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="column">
                            <label for="email">Email:</label>
                            <input type="email" name="email" value="<?php echo $email; ?>" required>
                        </div>
                        <div class="column">
                            <label for="tggl_lahir">Tanggal Lahir:</label>
                            <input type="date" name="tgl_lahir" value="<?php echo $tgl_lahir; ?>" required>
                        </div>
                        <div class="row">
                            <div class="column">
                                <label for="alamat">Alamat:</label>
                                <input type="alamat" name="alamat" value="<?php echo $alamat; ?>" required>
                            </div>
                        </div>
                        <input type="submit" class="btn" name="update" value="Submit">
                </form>
            </div>
    </main>
</body>

</html>