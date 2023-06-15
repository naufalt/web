<?php
session_start();
include('config.php');
if (!isset($_SESSION['user'])) {
  header("Location: login.php");
  exit();
}
$user = $_SESSION['user'];

$sql = "SELECT * FROM buku";
$result = mysqli_query($conn, $sql);
// $fotoBuku = $_FILES['foto_buku']['name'];
?>

<!doctype html>
<html lang="en">

<head>
  <title>Admin - Search</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/historystyle.css">
  <link rel="stylesheet" type="text/css" href="css/requestedstyle.css">
  <link rel="stylesheet" type="text/css" href="css/searchstyle.css">
  <style>
    .add-book-button {
      position: fixed;
      bottom: 30px;
      right: 30px;
      z-index: 999;
      background-color: #32BE8F;
    }
  </style>
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
          <h3>Books Data</h3>
        </section>
        <section class="table__body">
          <table>
            <thead>
              <div class='container'>
                <tr>
                  <th> Book Title <span class="icon-arrow">&UpArrow;</span></th>
                  <th> Cover <span class="icon-arrow">&UpArrow;</span></th>
                  <th> Author <span class="icon-arrow">&UpArrow;</span></th>
                  <th> Publisher <span class="icon-arrow">&UpArrow;</span></th>
                  <th> Year <span class="icon-arrow">&UpArrow;</span></th>
                  <th> Stock <span class="icon-arrow">&UpArrow;</span></th>
                  <th> Available <span class="icon-arrow">&UpArrow;</span></th>
                  <th colspan='2' style='padding-left: 100px; padding-right: 100px;'> Action </th>
                </tr>

                <?php
                if (!$result) {
                  die('Could not get data: ' . mysqli_error($conn));
                }
                $i = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                  echo "<tr>";
                  echo "<td>" . $row['judul_buku'] . "</td>";
                  echo "<td><img src='" . $row['cover_buku'] . "' width='100'></td>";
                  echo "<td>" . $row['pengarang'] . "</td>";
                  echo "<td>" . $row['penerbit'] . "</td>";
                  echo "<td>" . $row['tahun'] . "</td>";
                  echo "<td>" . $row['stok'] . "</td>";
                  echo "<td>" . $row['ketersediaan'] . "</td>";
                  echo "<td><a href='ubahBuku.php?id_buku={$row['id_buku']}' class='btn btn-primary'>Ubah</a></td>";
                  echo "<td><a href='bukudel.php?id_buku={$row['id_buku']}' class='btn btn-danger'>Hapus</a></td>";
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
    </div>
    <a href="tambahBuku.php" class="add-book-button">
      <button class="btn btn-primary btn-sm">Tambah Buku</button>
    </a>
  </main>
</body>

</html>