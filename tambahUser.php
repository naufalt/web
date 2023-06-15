<html>

<head>
    <title>Add User Data</title>
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
            <main>
                <div class="container">
                    <h2>Tambah User</h2>
                    <form method="post" action="uploadUser.php" enctype="multipart/form-data">
                        <div class="row">
                            <div class="column">
                                <label for="id_anggota">ID anggota</label>
                                <input name="id_anggota" type="text" id="id_anggota">
                            </div>
                            <div class="column">
                                <label for="nama">Nama</label>
                                <input name="nama" type="text" id="nama">
                            </div>
                        </div>
                        <div class="row">
                            <div class="column">
                                <label for="username">Username</label><br>
                                <input name="username" type="text" id="username">
                            </div>
                            <div class="column">
                                <label for="password">Password</label>
                                <input name="password" type="password" id="password">
                            </div>
                        </div>
                        <div class="row">
                            <div class="column">
                                <label for="jn_kelamin">Jenis kelamin</label>
                                <input name="jn_kelamin" type="text" id="jn_kelamin">
                            </div>
                            <div class="column">
                                <label for="alamat">Alamat</label>
                                <input name="alamat" type="text" id="alamat">
                            </div>
                        </div>
                        <div class="row">
                            <div class="column">
                                <label for="tgl_lahir">Tanggal lahir</label>
                                <input name="tgl_lahir" type="date" id="tgl_lahir">
                            </div>
                            <div class="column">
                                <label for="email">Email</label>
                                <input name="email" type="text" id="email">
                            </div>
                        </div>
                        <input type="submit" class="btn" name="upload" value="Upload">
                    </form>
            </main>

</body>

</html>