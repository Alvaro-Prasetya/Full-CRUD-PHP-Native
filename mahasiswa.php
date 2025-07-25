<?php

session_start();

//membatasi halaman sebelum login
if (!isset($_SESSION["login"])) {
    echo "<script>
            alert('Anda belum Login')
            document.location.href = 'login.php';
            </script>";
    exit;
}

//membatasi halaman sesuai user login
if ($_SESSION["level"] != 1 and $_SESSION["level"] != 3 )  {
    echo "<script>
            alert('perhatian anda tidak memiliki hak akses');
            document.location.href = 'crud-modal.php';   
            </script>";
        exit;
}

$title = 'Daftar Mahasiswa';

include 'layout/header.php';



//menampilkan data variabel
$data_mahasiswa = select("SELECT * FROM mahasiswa ORDER BY id_mahasiswa DESC");

?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container mt-5">
            <h1><i class="fas fa-users"></i> Data Mahasiswa</h1>
            <hr>

            <a href="tambah-mahasiswa.php" class="btn btn-primary mb-1"><i class="fas fa-plus-circle"></i> Tambah</a>

            <a href="download-excel-mahasiswa.php" class="btn btn-success mb-1"><i class="fas fa-file-excel"></i> Download Excel</a>

            <a href="download-pdf-mahasiswa.php" class="btn btn-danger mb-1"><i class="fas fa-file-pdf"></i> Download PDF</a>

            <table class="table table-bordered table-striped mt-3" id="tabel">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Prodi</th>
                        <th>Jenis kelamin</th>
                        <th>No telepon</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($data_mahasiswa as $mahasiswa) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $mahasiswa['nama']; ?></td>
                            <td><?= $mahasiswa['prodi']; ?></td>
                            <td><?= $mahasiswa['jenis_kelamin']; ?></td>
                            <td><?= $mahasiswa['no_telepon']; ?></td>
                            <td class="text-center" width="30%">
                                <a href="detail-mahasiswa.php?id_mahasiswa=<?= $mahasiswa['id_mahasiswa']; ?>" class="btn btn-secondary btn-sm"><i class="fas fa-eye"></i> Detail</a>
                                <a href="update-mahasiswa.php?id_mahasiswa=<?= $mahasiswa['id_mahasiswa']; ?>" class="btn btn-success btn-sm"><i class="fas fa-edit"></i> Ubah</a>
                                <a href="hapus-mahasiswa.php?id_mahasiswa=<?= $mahasiswa['id_mahasiswa']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('yakin ingin menghapus data ini?');"><i class="fas fa-trash"></i> Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div><!-- /.content-header -->



<?php include 'layout/footer.php'; ?>