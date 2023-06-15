<?php
session_start();
include("config.php");
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
$user = $_SESSION['user'];

// Mendapatkan daftar buku dari database
$sql = "SELECT * FROM buku";
$result = $conn->query($sql);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['tukar'])) {
        $judul_buku = $_POST['judul_buku'];

        // Mengurangi stok buku
        $updateQuery = "UPDATE buku SET stok = stok - 1 WHERE judul_buku = '$judul_buku'";
        mysqli_query($conn, $updateQuery);

        // Redirect ke halaman upload.php
        header("Location: upload.php");
        exit();
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <title>Search Admin</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/searchstyle.css">
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
                            <li><a href="search.php">Search Book</a></li>
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
                </section>
                <section class="table__body">
                    <table>
                        <thead>
                            <div class='container'>
                                <tr>
                                    <th>Book Title <span class="icon-arrow">&UpArrow;</span></th>
                                    <th>Cover <span class="icon-arrow">&UpArrow;</span></th>
                                    <th>Author <span class="icon-arrow">&UpArrow;</span></th>
                                    <th>Publisher <span class="icon-arrow">&UpArrow;</span></th>
                                    <th>Year <span class="icon-arrow">&UpArrow;</span></th>
                                    <th>Stock <span class="icon-arrow">&UpArrow;</span></th>
                                    <th>Timestamp <span class="icon-arrow">&UpArrow;</span></th>
                                    <th>Action</th>
                                </tr>

                                <?php
                                if (!$result) {
                                    die('Could not get data: ' . mysqli_error($conn));
                                }
                                $i = 1;
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr>";
                                    echo "<td>" . $row['judul_buku'] . "</td>";
                                    echo "<td><img src='" . $row['cover_buku'] . "'width='100'></td>";
                                    echo "<td>" . $row['pengarang'] . "</td>";
                                    echo "<td>" . $row['penerbit'] . "</td>";
                                    echo "<td>" . $row['tahun'] . "</td>";
                                    echo "<td>" . $row['stok'] . "</td>";
                                    echo "<td>" . $row['ketersediaan'] . "</td>";
                                    echo "<td>";
                                    echo "<form method='post' action=''>";
                                    echo "<input type='hidden' class='btn' name='judul_buku' value='" . $row['judul_buku'] . "'>";
                                    echo "<input type='submit' class='btn' name='tukar' value='Tukar'>";
                                    echo "</form>";
                                    echo "</td>";
                                    echo "</tr>";
                                    $i++;
                                }
                                echo "</tbody></table></div>";
                                mysqli_close($conn);
                                ?>
                            </div>
            </div>
            </thead>
            </table>
            </section>
        </div>
    </main>
</body>

</html>