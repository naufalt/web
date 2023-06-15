<?php
include('config.php');

$sql = "SELECT * FROM anggota";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die('Could not get data: ' . mysqli_error($conn));
}
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>

<head>
    <title>User Data</title>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/historystyle.css">
    <link rel="stylesheet" type="text/css" href="css/requestedstyle.css">
    <link rel="stylesheet" type="text/css" href="css/searchstyle.css">
    <style>
        .add-user-button {
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
                    <h3>User</h3>
                </section>
                <section class="table__body">
                    <table>
                        <thead>
                            <tr>
                                <th> Nama <span class="icon-arrow">&UpArrow;</span></th>
                                <th> Username <span class="icon-arrow">&UpArrow;</span></th>
                                <th> Password <span class="icon-arrow">&UpArrow;</span></th>
                                <th> Jenis Kelamin <span class="icon-arrow">&UpArrow;</span></th>
                                <th> Alamat <span class="icon-arrow">&UpArrow;</span></th>
                                <th> Email <span class="icon-arrow">&UpArrow;</span></th>
                                <th> Tanggal Lahir <span class="icon-arrow">&UpArrow;</span></th>
                                <th colspan='2' style='padding-left: 100px; padding-right: 100px;'> Action </th>
                            </tr>
                        </thead>
                        <?php
                        if ($result && $result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row['nama'] . "</td>";
                                echo "<td>" . $row['username'] . "</td>";
                                echo "<td>" . $row['password'] . "</td>";
                                echo "<td>" . $row['jn_kelamin'] . "</td>";
                                echo "<td>" . $row['alamat'] . "</td>";
                                echo "<td>" . $row['email'] . "</td>";
                                echo "<td>" . $row['tgl_lahir'] . "</td>";
                                echo "<td> <a href='ubahUser.php?id=" . $row['id_anggota'] . "' style= 'background-color: green; color : white; border-radius: 20px; padding: 6px 20px; text-decoration: none'> Ubah </a></td>";
                                echo "<td> <a href='userdel.php?id=" . $row['id_anggota'] . "' style= 'background-color: red; color : white; border-radius: 20px; padding: 6px 20px; text-decoration: none'> Hapus </a></td>";
                                echo "</form>";
                                echo "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='5'>No history found</td></tr>";
                        }
                        ?>
                    </table>
                    <a href="tambahUser.php" class="add-user-button">
                        <button class="btn btn-primary btn-sm">Tambah User</button>
                    </a>
    </main>
</body>

</html>