<?php

session_start();

//membatasi halaman sebelum login
if (!isset($_SESSION["login"])) {
    echo "<script>
            alert('Anda belum Login')
            document.location.href = 'login.php';
            </script>";
}

// kosongkan session user login
    $_SESSION = [];

    session_unset();
    session_destroy();
    header("location: login.php");