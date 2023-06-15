<?php
    include("config.php");
    if (isset($_POST['upload'])) {
        date_default_timezone_set("Asia/Jakarta");
        $tgl = date("Ymd");
        // ambil informasi dari file yang diupload

        print_r($_POST);
        $id_anggota = $_POST['id_anggota'];
        $nama = $_POST['nama'];
        $username= $_POST['username'];
        $password = $_POST['password'];
        $jn_kelamin = $_POST['jn_kelamin'];
        $alamat = $_POST['alamat'];
        $email = $_POST['email'];
        $tgl_lahir = $_POST['tgl_lahir'];

                //menambahkan sebuah data DML
                $sql = "INSERT INTO anggota (id_anggota, nama, username, password, jn_kelamin, alamat, email, tgl_lahir)
                        VALUES ('$id_anggota', '$nama', '$username', '$password', '$jn_kelamin', '$alamat', '$email', '$tgl_lahir')";
                $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
        
                header("Location: user.php");
    }
