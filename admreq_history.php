<?php
session_start();
include("config.php");
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
$user = $_SESSION['user'];

// Query untuk mendapatkan data detail penukaran buku
$query = "SELECT * FROM req_tukarbuku";
$result = mysqli_query($conn, $query);

// Fungsi untuk menghapus data dari tabel req_tukarbuku
function deleteRequest($nama)
{
    global $conn;
    $deleteQuery = "DELETE FROM req_tukarbuku WHERE nama = '$nama'";
    mysqli_query($conn, $deleteQuery);
}


// Fungsi untuk memasukkan data ke dalam tabel penukaran
function acceptRequest($data)
{
    global $conn;
    $nama = $data['nama'];
    $judul_buku = $data['judul_buku'];
    // Mengambil tanggal saat ini
    $tggl_pinjam = date("Y-m-d");

    // Menghitung tanggal pengembalian (7 hari ke depan)
    $tggl_pengembalian = date("Y-m-d", strtotime("+7 days"));

    $insertQuery = "INSERT INTO penukaran (nama, judul_buku, tggl_pinjam, tggl_pengembalian) VALUES ('$nama', '$judul_buku', '$tggl_pinjam', '$tggl_pengembalian')";
    mysqli_query($conn, $insertQuery);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['accept'])) {
        $nama = $_POST['nama'];
        $data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM req_tukarbuku WHERE nama = '$nama'"));
        acceptRequest($data);
        deleteRequest($nama);
    } elseif (isset($_POST['reject'])) {
        $nama = $_POST['nama'];
        deleteRequest($nama);
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Admin - Request History</title>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/requestedstyle.css">
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
            <div class="table">
                <section class="table__header">
                    <h3>Request History</h3>
                </section>
                <section class="table__body">
                    <table>
                        <thead>
                            <tr>
                                <th> Nama <span class="icon-arrow">&UpArrow;</span></th>
                                <th> Judul Buku <span class="icon-arrow">&UpArrow;</span></th>
                                <th> Cover <span class="icon-arrow">&UpArrow;</span></th>
                                <th> Pengarang <span class="icon-arrow">&UpArrow;</span></th>
                                <th> Penerbit <span class="icon-arrow">&UpArrow;</span></th>
                                <th> Tahun <span class="icon-arrow">&UpArrow;</span></th>
                                <th> Aksi <span class="icon-arrow"></span></th>
                            </tr>
                        </thead>

                        <?php
                        // Cek apakah query berhasil dijalankan
                        if ($result) {
                            // Cek apakah ada data yang ditemukan
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr>";
                                    echo "<td>" . $row['nama'] . "</td>";
                                    echo "<td>" . $row['judul_buku'] . "</td>";
                                    echo "<td><img src='file/" . $row['cover'] . "' width='100' ></td>";
                                    echo "<td>" . $row['pengarang'] . "</td>";
                                    echo "<td>" . $row['penerbit'] . "</td>";
                                    echo "<td>" . $row['tahun'] . "</td>";
                                    echo "<td>
                                    <form method='post' action=''>
                                        <input type='hidden' name='nama' value='" . $row['nama'] . "'>
                                        <input type='submit' name='accept' value='Accept'>
                                        <input type='submit' name='reject' value='Reject'>
                                    </form>
                                    </td>";
                                    echo "</tr>";
                                }
                                echo "</table>";
                            } else {
                                echo "<h2>No Request History Found</h2>";
                            }
                        } else {
                            echo "Error executing query: " . mysqli_error($conn);
                        }

                        mysqli_close($conn);
                        ?>
                </section>
            </div>
    </main>
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <script src="js/profile.js"></script>
</body>

</html>