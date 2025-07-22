<?php

session_start();

//membatasi halaman sebelum login
if (!isset($_SESSION["login"])) {
    echo "<script>
            alert('Anda belum Login')
            document.location.href = 'login.php';
            </script>";
}

include 'config/app.php';

// menerima id barang yang dipilih pengguna
$id_barang = (int)$_GET['id_barang'];

if (delete_barang($id_barang) > 0) {
    echo "<script>
            alert('Data barang berhasil dihapus');
            document.location.href = 'index.php';
         </script>";
} else {
    echo "<script>
            alert('Data barang Gagal dihapus');
            document.location.href = 'index.php';
         </script>";
}