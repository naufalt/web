<?php
include("config.php");
if (isset($_POST['upload'])) {
    date_default_timezone_set("Asia/Jakarta");
    $tgl = date("Ymd");

    // Ambil informasi dari file yang diupload
    $tmp_file = $_FILES['foto_buku']['tmp_name'];
    $nm_file = $_FILES['foto_buku']['name'];
    $ukuran_file = $_FILES['foto_buku']['size'];
    $size = 10000000; // Limit 10 MB

    $idbuku = isset($_POST['idbuku']) ? $_POST['idbuku'] : '';
    $judul_buku = isset($_POST['judul']) ? $_POST['judul'] : '';
    $pengarang = isset($_POST['pengarang']) ? $_POST['pengarang'] : '';
    $penerbit = isset($_POST['penerbit']) ? $_POST['penerbit'] : '';
    $tahun = isset($_POST['tahun']) ? $_POST['tahun'] : '';
    $stok_buku = isset($_POST['stok']) ? $_POST['stok'] : '';
    $ketersediaan = isset($_POST['ketersediaan']) ? $_POST['ketersediaan'] : '';

    if ($ukuran_file > $size) {
        echo "<strong>Gagal upload! <br>Ukuran Maksimal 10MB, saat ini ukuran file " . $ukuran_file . "</strong>";
        echo "<a href='tambahBuku.php'>Upload ulang</a>";
        exit();
    } else {
        if ($nm_file) {
            $dir = "fotobuku/$nm_file";
            move_uploaded_file($tmp_file, $dir);


             // Mengambil tanggal saat ini
            $tggl_pinjam = date("Y-m-d");

            // Menghitung tanggal pengembalian (7 hari ke depan)
            $tggl_pengembalian = date("Y-m-d", strtotime("+7 days"));
            // Menambahkan data ke database
            $sql = "INSERT INTO buku (id_buku, judul_buku, cover_buku, pengarang, penerbit, tahun, stok, ketersediaan)
                    VALUES ('$idbuku', '$judul_buku', 'file/$nm_file', '$pengarang', '$penerbit', '$tahun', '$stok_buku', '$tggl_pengembalian')";
            $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));

            echo "<strong>$nm_file</strong> berhasil di upload!<br><br>";
            echo "<a href='admsearch.php' style='background-color: peru; color: white; border-radius: 20px; padding: 6px 10px; text-decoration: none'>Lihat Data</a>";
        } else {
            echo "Gagal upload!<br><br>";
            echo "<a href='tambahBuku.php' style='background-color: peru; color: white; border-radius: 20px; padding: 6px 10px; text-decoration: none'>Upload ulang</a>";
        }
    }
}
