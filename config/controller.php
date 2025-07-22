<?php

function dd($value)
{
    echo '<pre>';
    echo var_dump($value);
    echo '</pre>';
    die;
}

// fungsi menampilkan data
function select($query)
{
    //panggil koneksi database
    global $db;

    $result = mysqli_query($db, $query);
    $rows = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

// fungsi menambahkan data barang

function create_barang($post)
{
    global $db;

    $nama       = strip_tags($post['nama']);
    $jumlah     = strip_tags($post['jumlah']);
    $harga      = strip_tags($post['harga']);
    $barcode    = rand(100000, 999999); // Generate a random barcode    

    // query tambah data
    $query = "INSERT INTO barang VALUES(null, '$nama', '$jumlah', '$harga', '$barcode', CURRENT_TIMESTAMP())";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

// fungsi mengubah data barang
function update_barang($post)
{
    global $db;

    $id_barang  = $post['id_barang'];
    $nama       = strip_tags($post['nama']);
    $jumlah     = strip_tags($post['jumlah']);
    $harga      = strip_tags($post['harga']);

    // query tambah data
    $query = "UPDATE barang SET nama = '$nama', jumlah = '$jumlah', harga = '$harga' WHERE id_barang = $id_barang";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

// fungsi menghapus data barang
function delete_barang($id_barang)
{
    global $db;

    // query hapus data barang
    $query = "DELETE FROM barang WHERE id_barang = $id_barang";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

// fungsi menambahkan data mahasiswa 
function create_mahasiswa($post)
{
    global $db;

    $nama = strip_tags($post['nama']);
    $prodi = strip_tags($post['prodi']);
    $jenis_kelamin = strip_tags($post['jenis_kelamin']);
    $no_telepon = strip_tags($post['no_telepon']);
    $alamat = $post['alamat'];
    $email = strip_tags($post['email']);
    $foto = upload_file();

    //check uploud foto
    if (!$foto) {
        return false;
    }

    //query tambahkan data mahasiswa
    $query = "INSERT INTO mahasiswa VALUES(null, '$nama', '$prodi', '$jenis_kelamin', '$no_telepon', '$alamat', '$email', '$foto')";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

// fungsi mengubah data mahasiswa
function update_mahasiswa($post) {
    global $db;

    $id_mahasiswa = strip_tags($post['id_mahasiswa']);
    $nama = strip_tags($post['nama']);
    $prodi = strip_tags($post['prodi']);
    $jenis_kelamin = strip_tags($post['jenis_kelamin']);
    $no_telepon = strip_tags($post['no_telepon']);
    $alamat = $post['alamat'];
    $email = strip_tags($post['email']);
    $fotoLama = strip_tags($post['fotoLama']);

    //check uploud foto baru atau tidakk
    if ($_FILES['foto']['error'] == 4) {
        $foto = $fotoLama;
    } else {
        $foto = upload_file();
    }

    //query update data
    $query = "UPDATE mahasiswa SET nama = '$nama', prodi = '$prodi', jenis_kelamin = '$jenis_kelamin', no_telepon = '$no_telepon', alamat = '$alamat', email = '$email', foto = '$foto' WHERE id_mahasiswa = $id_mahasiswa";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}




// fungsi menguploud file
function upload_file()
{
    $namaFile = $_FILES['foto']['name'];
    $ukuranFile = $_FILES['foto']['size'];
    $error = $_FILES['foto']['error'];
    $tmpName = $_FILES['foto']['tmp_name'];

    //chech file yang diuploud
    $extensifileValid = ['jpg', 'jpeg', 'png'];
    $extensifile      = explode('.', $namaFile);
    $extensifile      = strtolower(end($extensifile));

    // chech format/extensi file
    if (!in_array($extensifile, $extensifileValid)) {
        //pesan gagal
        echo "<script>
                alert('Format File Tidak Valid');
                document.location.href = 'tambah-mahasiswa.php';
            </script>";
        die();
    }

    //chech ukuran file 5 MB
    if ($ukuranFile > 5000000) {
        //pesan gagal
        echo "<script>
                alert('ukuran File max 5 MB');
                document.location.href = 'tambah-mahasiswa.php';
            </script>";
        die();
    }

    // generate nama file baru
    $namafileBaru = uniqid();
    $namafileBaru .= '.';
    $namafileBaru .= $extensifile;

    // pindahkan ke folfer local 
    move_uploaded_file($tmpName, 'assets/img/' . $namafileBaru);
    return $namafileBaru;
}

// fungsi menghapus data siswa
function delete_mahasiswa($id_mahasiswa)
{
    global $db;

    // ambil foto sesuai yang dipilih
    $foto = select("SELECT * FROM mahasiswa WHERE id_mahasiswa = $id_mahasiswa")[0];
    unlink("assets/img/". $foto['foto']);

    //query hapus data mahasiswa
    $query = "DELETE FROM mahasiswa WHERE id_mahasiswa = $id_mahasiswa";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

//fungsi tambah akun
function create_akun($post)
{
    global $db;

    $nama = strip_tags($post['nama']);
    $username = strip_tags($post['username']);
    $email = strip_tags($post['email']);
    $password = strip_tags($post['password']);
    $level = strip_tags($post['level']);

    //enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    //query tambah akun
    $query = "INSERT INTO akun values(null, '$nama', '$username', '$email', '$password', '$level')";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

//fungsi Ubah akun
function update_akun($post)
{
    global $db;

    $id_akun = strip_tags($post['id_akun']);
    $nama = strip_tags($post['nama']);
    $username = strip_tags($post['username']);
    $email = strip_tags($post['email']);
    $password = strip_tags($post['password']);
    $level = strip_tags($post['level']);

    //enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    //query ubah akun
    $query = "UPDATE akun SET nama = '$nama', username = '$username', email = '$email', password = '$password', level = '$level' WHERE id_akun = $id_akun";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

// fungsi hapus data akun
function delete_akun($id_akun)
{
    global $db;

    //query apus data
    $query ="DELETE FROM akun WHERE id_akun = $id_akun";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}