<?php
session_start();    
include('config.php');

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$user = $_SESSION['user'];

// Cek apakah parameter id_buku telah diberikan
if (isset($_GET['id_buku'])) {
    $id_buku = $_GET['id_buku'];

    // Periksa apakah form ubah telah disubmit
    if (isset($_POST['submit'])) {
        // Ambil data dari form
        $judul_buku = $_POST['judul_buku'];
        $pengarang = $_POST['pengarang'];
        $penerbit = $_POST['penerbit'];
        $tahun = $_POST['tahun'];
        $stok = $_POST['stok'];
        $ketersediaan = $_POST['ketersediaan'];

        // Lakukan update data buku ke dalam database
        $sql = "UPDATE buku SET judul_buku='$judul_buku', pengarang='$pengarang', penerbit='$penerbit', tahun='$tahun', stok='$stok', ketersediaan='$ketersediaan' WHERE id_buku='$id_buku'";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            // Jika update berhasil, redirect ke halaman admsearch.php
            header("Location: admsearch.php");
            exit();
        } else {
            // Jika terjadi kesalahan, tampilkan pesan error
            echo "Error: " . mysqli_error($conn);
        }
    }

    // Ambil data buku berdasarkan id_buku
    $sql = "SELECT * FROM buku WHERE id_buku='$id_buku'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
?>

    <!doctype html>
    <html lang="en">

    <head>
        <title>Change Book Data</title>
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
                    <h2>Ubah Buku</h2>
                    <form method="post" action="">
                        <div class="row">
                            <div class="column">
                                <label for="judul_buku">Judul Buku:</label>
                                <input type="text" name="judul_buku" value="<?php echo $row['judul_buku']; ?>" required>
                            </div>
                            <div class="column">
                                <label for="pengarang">Pengarang:</label>
                                <input type="text" name="pengarang" value="<?php echo $row['pengarang']; ?>" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="column">
                                <label for="penerbit">Penerbit:</label>
                                <input type="text" name="penerbit" value="<?php echo $row['penerbit']; ?>" required>
                            </div>
                            <div class="column">
                                <label for="tahun">Tahun Terbit:</label>
                                <input type="text" name="tahun" value="<?php echo $row['tahun']; ?>" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="column">
                                <label for="stok">Stok:</label>
                                <input type="text" name="stok" value="<?php echo $row['stok']; ?>" required>
                            </div>
                            <div class="column">
                                <label for="ketersediaan">Ketersediaan:</label>
                                <input type="text" name="ketersediaan" value="<?php echo $row['ketersediaan']; ?>" required>
                            </div>
                        </div>
                        <input type="submit" class="btn" name="submit" value="Submit">
                    </form>
                </div>
            </div>
        </main>
    </body>

    </html>

<?php
} else {
    // Jika parameter id_buku tidak ditemukan, redirect ke halaman admsearch.php
    header("Location: admsearch.php");
    exit();
}

mysqli_close($conn);
?>