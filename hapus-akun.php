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

// menerima id Akun yang dipilih pengguna
$id_akun = (int)$_GET['id_akun'];

if (delete_akun($id_akun) > 0) {
    echo "<script>
            alert('Data Akun berhasil dihapus');
            document.location.href = 'crud-modal.php';
         </script>";
} else {
    echo "<script>
            alert('Data Akun Gagal dihapus');
            document.location.href = 'crud-modal.php';
         </script>";
}