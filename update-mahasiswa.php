<?php

$title = 'Ubah Mahasiswa';

require_once 'layout/header.php';

if (isset($_POST['ubah'])) {
    if (update_mahasiswa($_POST) > 0) {
        echo "<script>
                alert('Data Mahasiswa Berhasil diubah');
                document.location.href = 'mahasiswa.php';
                </script>";
    } else {
        echo "<script>
                alert('Data Mahasiswa gagal diubah');
                document.location.href = 'mahasiswa.php';
                </script>";
    }
}

//tampil id mahasiswa dari url
$id_mahasiswa = (int)$_GET['id_mahasiswa'];

// query ambil data mahasiswa
$mahasiswa = select("SELECT * FROM mahasiswa WHERE id_mahasiswa = $id_mahasiswa")[0];

?>

<div class="container mt-5">
    <h1>Ubah Mahasiswa</h1>
    <hr>

    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_mahasiswa" value="<?= $mahasiswa['id_mahasiswa']; ?>">
        <input type="hidden" name="fotoLama" value="<?= $mahasiswa['id_mahasiswa'];?>">

        <div class="mb-3">
            <label for="nama" class="form-label">Nama Mahasiswa</label>
            <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama Mahasiswa.." required value="<?= $mahasiswa['nama']; ?>">
        </div>

        <div class="row">
            <div class="mb-3 col-6">
                <label for="prodi" class="form-label">Program Studi</label>
                <select name="prodi" id="prodi" class="form-control" required>
                    <?php $prodi = $mahasiswa['prodi']; ?>
                    <option value="Teknik Informatika" <?= $prodi == '' ? 'selected' : null ?>>Teknik Informatika</option>
                    <option value="Teknil Sipil" <?= $prodi == 'Teknik Sipil' ? 'selected' : null ?>>Teknik Sipil</option>
                    <option value="Teknik Informasi" <?= $prodi == 'Teknik Informasi' ? 'selected' : null ?>>Teknik Informasi</option>
                </select>
            </div>

            <div class="mb-3 col-6">
                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                    <?php $jenis_kelamin = $mahasiswa ['jenis-kelamin']; ?>
                    <option value="Laki-Laki" <?= $jenis_kelamin == 'Laki-Laki' ? 'selected' : null ?>>Laki-Laki</option>
                    <option value="Perempuan" <?= $jenis_kelamin == 'Perempuan' ? 'selected' : null ?>>Perempuan</option>
                </select>
            </div>
        </div>

        <div class="mb-3">
            <label for="no_telepon" class="form-label">telepon</label>
            <input type="number" class="form-control" id="no_telepon" name="no_telepon" placeholder="Telepon..." required value="<?= $mahasiswa['no_telepon']; ?>">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="email..." required value="<?= $mahasiswa['email']; ?>">
        </div>

        <div class="mb-3">
            <label for="foto" class="form-label">Foto</label>
            <input type="file" class="form-control" id="foto" name="foto" placeholder="Foto..." onchange="previewImg()">
            
            <img src="assets/img/<?= $mahasiswa['foto']; ?>" alt="" class="img-thumbnail img-preview" width="100px">
        </div>

        <button type="submit" name="ubah" class="btn btn-success mb-5" style="float: right;">Ubah</button>
    </form>
</div>

<!-- //previewimg -->
<script>
    function previewImg() {
        const foto = document.querySelector('#foto');
        const imgPreview = document.querySelector('.img-preview');

        const fileFoto = new FileReader();
        fileFoto.readAsDataURL(foto.files[0]);
        
        fileFoto.onload = function(e) {
            imgPreview.src = e.target.result;
        }
    }
</script>

<?php include 'layout/footer.php'; ?>