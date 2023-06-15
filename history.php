<?php
session_start();
include("config.php");
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
$user = $_SESSION['user'];

// Query untuk mendapatkan data detail penukaran buku
$query = "SELECT * FROM penukaran";
$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html>

<head>
    <title>History</title>
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
            <div class="table">
                <section class="table__header">
                    <h3>Penukaran History</h3>
                </section>
                <section class="table__body">
                    <table>
                        <thead>
                            <tr>
                                <th> Nama <span class="icon-arrow">&UpArrow;</span></th>
                                <th> Judul Buku <span class="icon-arrow">&UpArrow;</span></th>
                                <th> Tanggal Pinjam <span class="icon-arrow">&UpArrow;</span></th>
                                <th> Tanggal Pengembalian <span class="icon-arrow">&UpArrow;</span></th>
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
                                    echo "<td>" . $row['tggl_pinjam'] . "</td>";
                                    echo "<td>" . $row['tggl_pengembalian'] . "</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='4'>No Penukaran History Found</td></tr>";
                            }
                        } else {
                            echo "<tr><td colspan='4'>Error executing query: " . mysqli_error($conn) . "</td></tr>";
                        }
                        mysqli_close($conn);
                        ?>
                    </table>
                </section>
            </div>
        </div>
    </main>
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <script src="js/profile.js"></script>
</body>

</html>