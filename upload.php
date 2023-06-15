<!DOCTYPE html>
<html>

<head>
    <title>Upload Page</title>
    <link rel="stylesheet" type="text/css" href="css/uploadstyle.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
            <main>
                <?php
                session_start();
                include("config.php");

                // Menangani saat tombol upload diklik
                if (isset($_POST['upload'])) {
                    // Mendapatkan data dari formulir
                    $nama = $_POST['nama'];
                    $judul = $_POST['judul'];
                    $pengarang = $_POST['pengarang'];
                    $penerbit = $_POST['penerbit'];
                    $tahun = $_POST['tahun'];
                    $fotoBuku = $_FILES['foto_buku']['name'];
                    $tempFotoBuku = $_FILES['foto_buku']['tmp_name'];

                    // Memindahkan foto buku yang diupload ke direktori yang diinginkan
                    move_uploaded_file($tempFotoBuku, "file/" . $fotoBuku);

                    // Menyimpan data penukaran buku ke dalam tabel req_tukarbuku
                    $sqlInsert = "INSERT INTO req_tukarbuku (nama, judul_buku, cover, pengarang, penerbit, tahun) VALUES ('$nama', '$judul','$fotoBuku', '$pengarang', '$penerbit', '$tahun')";
                    if ($conn->query($sqlInsert) === TRUE) {
                        $message = "Book trade successfully";
                    }

                    // Redirect ke halaman lain setelah berhasil mengupload buku
                    header("Location: req_history.php");
                    exit();
                }
                ?>
                <div class="container">
                    <h2>Upload Buku Anda</h2>
                    <form method="post" action="" enctype="multipart/form-data">
                        <div class="row">
                            <div class="column">
                                <label for="nama">Name</label>
                                <input type="text" id="name" name="nama" required>
                            </div>
                            <div class="column">
                                <label for="judul">Book Title</label>
                                <input type="text" id="judul" name="judul" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="column">
                                <label for="foto_buku">Cover</label>
                                <input type="file" id="foto_buku" name="foto_buku" required>
                            </div>
                            <div class="column">
                                <label for="pengarang">Author</label>
                                <input type="text" id="pengarang" name="pengarang" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="column">
                                <label for="penerbit">Publisher</label>
                                <input type="text" id="penerbit" name="penerbit" required>
                            </div>
                            <div class="column">
                                <label for="tahun">Year</label>
                                <input type="text" id="tahun" name="tahun" required>
                            </div>
                        </div>
                        <input type="submit" class="btn" name="upload" value="Upload">
            </main>
</body>

</html>