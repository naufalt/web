<html>

<head>
    <title>Add Book Data</title>
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
                            <li><a href="admsearch.php">Search Book</a></li>
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
                <h2>Upload Buku Anda</h2>
                <form method="post" action="prosesTambah.php" enctype="multipart/form-data">
                    <div class="row">
                        <div class="column">
                            <label for="idbuku">ID Buku</label>
                            <input type="text" id="idbuku" name="idbuku" required>
                        </div>
                        <div class="column">
                            <label for="judul">Book Title</label>
                            <input type="text" id="judul" name="judul" required>
                        </div>
                        <div class="column">
                            <label for="foto_buku">Cover</label>
                            <input type="file" id="foto_buku" name="foto_buku" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="column">
                            <label for="pengarang">Author</label>
                            <input type="text" id="pengarang" name="pengarang" required>
                        </div>
                        <div class="column">
                            <label for="penerbit">Publisher</label>
                            <input type="text" id="penerbit" name="penerbit" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="column">
                            <label for="tahun">Year</label>
                            <input type="text" id="tahun" name="tahun" required>
                        </div>
                        <div class="column">
                            <label for="stok">Stock</label>
                            <input type="text" id="stok" name="stok" required>
                        </div>
                        <div class="column">
                            <div class="row">
                            </div>
                        </div>
                    </div>
                    <input type="submit" class="btn" name="upload" value="Upload">
                </form>
            </div>
    </main>
</body>

</html>