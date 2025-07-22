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

// menerima id mahasiswa yang dipilih pengguna
$id_mahasiswa = (int)$_GET['id_mahasiswa'];

if (delete_mahasiswa($id_mahasiswa) > 0) {
    echo "<script>
            alert('Data Mahasiswa berhasil dihapus');
            document.location.href = 'mahasiswa.php';
         </script>";
} else {
    echo "<script>
            alert('Data Mahasiswa Gagal dihapus');
            document.location.href = 'mahasiswa.php';
         </script>";
}