<?php

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