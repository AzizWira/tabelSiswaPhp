<?php 
$koneksi = mysqli_connect("localhost", "root", "", "db_sekolah");
function query($query){
    global $koneksi;
    $result = mysqli_query($koneksi, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
}
return $rows;

}

function tambah($data) {
    global $koneksi;

    $nama = htmlspecialchars($data["nama"]);
    $absen_siswa = htmlspecialchars($data["absen_siswa"]);
    $ttl = htmlspecialchars($data["ttl"]);
    $jenis_kelamin = htmlspecialchars($data["jenis_kelamin"]);
    $umur = htmlspecialchars($data["umur"]);
    $alamat = htmlspecialchars($data["alamat"]);
    // $foto = $data["foto"];
    $foto = upload_foto();
    if (!$foto) {
        return false;
    }

    $query = "INSERT INTO tb_siswa
        VALUES ('', '$nama', '$absen_siswa', '$ttl', '$jenis_kelamin', '$umur', '$alamat', '$foto')";
        
    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

function hapus($id){
    global $koneksi;
    mysqli_query($koneksi,"DELETE FROM tb_siswa WHERE id=$id");
    return mysqli_affected_rows($koneksi);
}

function ubah($data) {
    global $koneksi;
    $id =$_GET['id'];
    $nama = htmlspecialchars ($data["nama"]);
    $absen_siswa = htmlspecialchars($data["absen_siswa"]);
    $ttl = htmlspecialchars($data["ttl"]);
    $jenis_kelamin = htmlspecialchars($data["jenis_kelamin"]);
    $umur = htmlspecialchars ($data["umur"]);
    $alamat = htmlspecialchars ($data["alamat"]);
    // $foto  = $data["foto"];
    $fotolama = $data["foto_lama"];
    $noUploadFoto = $_FILES['foto']['error'];

    if($noUploadFoto === 4){
        $foto = $fotolama;
    } else {
        $foto = upload_foto();
    }

    $query = "UPDATE tb_siswa SET nama = '$nama', absen_siswa = '$absen_siswa' , ttl = '$ttl' , jenis_kelamin = '$jenis_kelamin' , umur = $umur , alamat = '$alamat' , foto='$foto'   WHERE id=$id";

    mysqli_query($koneksi, $query);
    
    return mysqli_affected_rows($koneksi);
}

function upload_foto(){
    $nama_file = $_FILES['foto']['name'];
    $ukuran_file = $_FILES['foto']['size'];
    $error = $_FILES['foto']['error'];
    $tmp_name = $_FILES['foto']['tmp_name'];

    if ($error === 4) {
        echo "<script>
            alert('Pilih Foto Terlebih Dahulu');
        </script>";
        return false;
    }

    $ekstensi_foto_valid = ['jpg', 'jpeg', 'png', 'gif'];
    $ekstensi_foto = explode('.', $nama_file);
    $ekstensi_foto = strtolower(end($ekstensi_foto));
    if (!in_array($ekstensi_foto, $ekstensi_foto_valid)) {
        echo "<script>
            alert('Yang Anda Upload Bukan Foto');
        </script>";
        return false;
    }

    if ($ukuran_file > 5000000) {
        echo "<script>
            alert('Ukuran Foto Terlalu Besar');
        </script>";
        return false;
    }
    
    $nama_file_baru = uniqid();
    $nama_file_baru .= '.';
    $nama_file_baru .= $ekstensi_foto;

    move_uploaded_file($tmp_name, 'asset/' . $nama_file_baru);

    return $nama_file_baru;
}


?>