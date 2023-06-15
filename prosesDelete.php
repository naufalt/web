<?php
if (isset($_GET['delete'])) {
    $id_buku = mysqli_real_escape_string($conn, $_GET['delete']);


    // Delete foto
    $foto = query("SELECT foto FROM buku WHERE id_buku = $id_buku")['cover_buku'];
    if (unlink('file/' . $foto)) {
        // File berhasil dihapus
    } else {
        // Gagal menghapus file
    }    

    $query = "DELETE FROM buku WHERE id_buku = $id_buku";

    $deleteBook = mysqli_query($conn, $query);

    if (!empty($deleteBook)) {

        setcookie('message', 'Berhasil menghapus buku!', time() + 1);
        header("Location: admsearch.php");
    } else {

        setcookie('message', 'Gagal menghapus buku!', time() + 1);
        header("Location: admsearch.php");
    }
}
