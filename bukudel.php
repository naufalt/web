<?php
session_start();
include('config.php');

if (!isset($_SESSION['user'])) {
  header("Location: login.php");
  exit();
}

// Periksa apakah parameter id_buku telah diterima
if (!isset($_GET['id_buku'])) {
  header("Location: admsearch.php");
  exit();
}

$id_buku = $_GET['id_buku'];

// Hapus buku berdasarkan ID
$sql = "DELETE FROM buku WHERE id_buku = '$id_buku'";
if (mysqli_query($conn, $sql)) {
  // Redirect ke halaman admsearch.php jika penghapusan berhasil
  header("Location: admsearch.php");
  exit();
} else {
  echo "Error: " . mysqli_error($conn);
}

mysqli_close($conn);
