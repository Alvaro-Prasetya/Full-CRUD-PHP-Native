<?php

$title = 'Ubah Barang';

require_once 'layout/header.php';

//mengambil id_barang dari url
$id_barang = (int)$_GET['id_barang'];

$barang = select("SELECT * FROM barang WHERE id_barang = $id_barang")[0];

if (isset($_POST['ubah'])) {
    if (update_barang($_POST) > 0 ) {
        echo "<script>
                alert('Data barang Berhasil Diubah');
                document.location.href = 'index.php';
                </script>";
    }   else {
        echo "<script>
                alert('Data barang gagal Diubah');
                document.location.href = 'index.php';
                </script>";
    }
}
?>



<div class="container mt-5">
    <h1>Ubah barang</h1>
    <hr>

    <form action="" method="post">
        <input type="hidden" name="id_barang" value="<?= $barang['id_barang']; ?>">
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Barang</label>
            <input type="text" class="form-control" id="nama" name="nama" value="<?= $barang['nama']; ?>" placeholder="Masukkan nama barang" required>
        </div>

        <div class="mb-3">
            <label for="jumlah" class="form-label">Jumlah Barang</label>
            <input type="number" class="form-control" id="jumlah" name="jumlah" value="<?= $barang['jumlah']; ?>" placeholder="jumlah barang.." required>
        </div>

         <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" class="form-control" id="harga" name="harga" value="<?= $barang['harga']; ?>" placeholder="harga barang.." required>
        </div>

        <button type="submit" name="ubah" class="btn btn-success mb-5" style="float: right;">Ubah</button>
    </form>
</div>

<?php include 'layout/footer.php'; ?>