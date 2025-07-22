<?php

// render halaman menjadi json
header('Content-Type: application/json');


require '../config/app.php';

//menerima input
$nama = $_POST['nama'];
$jumlah = $_POST['jumlah'];
$harga = $_POST['harga'];

//validasi data
if ($nama == null) {
    echo json_encode(['pesan' => 'Nama Barang tidak boleh kosong']);
    exit;
}

$query = "INSERT INTO barang VALUES(null, '$nama', '$jumlah', '$harga', CURRENT_TIMESTAMP())";
mysqli_query($db, $query);

//check status data
if ($query) {
    echo json_encode(['pesan' => 'Data Barang berhasil ditambahkan']);
} else {
    echo json_encode(['pesan' => 'Data Barang gagal ditambahkan']);
}



// echo json_encode(['$data_barang' => $query]);