<?php

$title = 'Detail Mahasiswa';

include 'layout/header.php';



// mengambil data mahasiswa dari url
$id_mahasiswa = (int)$_GET['id_mahasiswa'];

//menampilkan data variabel
$mahasiswa = select("SELECT * FROM mahasiswa WHERE id_mahasiswa = $id_mahasiswa")[0];



?>
<div class="container mt-5">
    <h1>Data <?= $mahasiswa['nama']; ?></h1>
    <hr>
    <table class="table table-bordered table-striped mt-3">
        <tr>
            <td>Nama</td>
            <td> <?= $mahasiswa['nama']; ?></td>
        </tr>

        <tr>
            <td>Program Studi</td>
            <td> <?= $mahasiswa['prodi']; ?></td>
        </tr>

        <tr>
            <td>Jenis-Kelamin</td>
            <td> <?= $mahasiswa['jenis_kelamin']; ?></td>
        </tr>

        <tr>
            <td>telepon</td>
            <td> <?= $mahasiswa['no_telepon']; ?></td>
        </tr>

        <tr>
            <td>email</td>
            <td> <?= $mahasiswa['email']; ?></td>
        </tr>

        <tr>
            <td width="50%">Foto</td>
            <td>
                <a href="assets/img/foto.png">
                    <img src="assets/img/foto.png" alt="foto" width="50%">
                </a>
            </td>
        </tr>

    </table>
    <a href="mahasiswa.php" class="btn btn-secondary btn-sm" style="float: right ;">Kembali</a>
</div>

<?php include 'layout/footer.php' ?>