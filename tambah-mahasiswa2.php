<?php

session_start();

//membatasi halaman sebelum login
if (!isset($_SESSION["login"])) {
    echo "<script>
            alert('Anda belum Login')
            document.location.href = 'login.php';
            </script>";
}

$title = 'Daftar Mahasiswa';

require_once 'layout/header.php';

if (isset($_POST['tambah'])) {
    if (create_mahasiswa($_POST) > 0) {
        echo "<script>
                alert('Data Mahasiswa Berhasil ditambahkan');
                document.location.href = 'mahasiswa.php';
                </script>";
    } else {
        echo "<script>
                alert('Data Mahasiswa gagal ditambahkan');
                document.location.href = 'mahasiswa.php';
                </script>";
    }
}
?>

<div class="container mt-5">
    <h1>Tambah Mahasiswa</h1>
    <hr>

    <form action="" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Mahasiswa</label>
            <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama Mahasiswa.." required>
        </div>

        <div class="row">
            <div class="mb-3 col-6">
                <label for="prodi" class="form-label">Program Studi</label>
                <select name="prodi" id="prodi" class="form-control" required>
                    <option value="">-- pilih prodi --</option>
                    <option value="Teknik Informatika">Teknik Informatika</option>
                    <option value="Teknil Sipil">Teknik Sipil</option>
                    <option value="Teknik Informasi">Teknik Informasi</option>
                </select>
            </div>

            <div class="mb-3 col-6">
                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                    <option value="">-- pilih jenis kelamin --</option>
                    <option value="Laki-Laki">Laki-Laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
        </div>

        <div class="mb-3">
            <label for="no_telepon" class="form-label">telepon</label>
            <input type="number" class="form-control" id="no_telepon" name="no_telepon" placeholder="Telepon..." required>
        </div>

        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea name="alamat" id="alamat"></textarea>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="email..." required>
        </div>

        <div class="mb-3">
            <label for="foto" class="form-label">Foto</label>
            <input type="file" class="form-control" id="foto" name="foto" placeholder="Foto..." onchange="previewImg()">

            <img src="" alt="" class="img-thumbnail img-preview" width="100px">
        </div>

        <button type="submit" name="tambah" class="btn btn-success mb-5" style="float: right;">Tambah</button>
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