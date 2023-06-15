<?php
    include("config.php");

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // Perintah SQL untuk menghapus data pengguna berdasarkan ID
        $sql = "DELETE FROM anggota WHERE id_anggota = '$id'";
        $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));

        // Cek apakah penghapusan berhasil
        if ($query) {
            header("Location: user.php");
            exit();
        } else {
            echo "Gagal menghapus data pengguna.";
        }
    } else {
        echo "ID pengguna tidak diberikan.";
    }
