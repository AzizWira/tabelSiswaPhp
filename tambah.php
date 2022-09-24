<?php
$koneksi = mysqli_connect('localhost', 'root', '', 'db_sekolah');
if (isset($_POST['submit'])) {
    require 'function.php';

    if (tambah($_POST) > 0) {
        echo "
        <script>
            alert('Data Sukses di Tambahkan');
            document.location.href = 'index.php';
        </script>";
    } else {
        echo "
        <script>
            alert('Data Gagal Di Tambahkan');
            document.location.href = 'index.php';
        </script>";
    }
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body>
<?php include 'navbar.php'; ?>

    <div class="container" style="margin-top: 20px;">
        <div class="row">
            <div class="col-md-12">
                <h3 align="center">Tambah Data Siswa</h3>
                <div class="card">
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <br>
                            <div class="form-group">
                            <label for="" class="form-label">Nama</label>
                            <input type="text" class="form-control" name="nama" id="nama" placeholder="Tambah Nama" required>
                            </div>
                            <br>
                            <div class="form-group">
                            <label for="" class="form-label">Nomor Absen</label>
                            <input type="number" class="form-control" name="absen_siswa" id="nama" placeholder="Tambah Nomor Absen" required>
                            </div>
                            <br>
                            <div class="form-group">
                            <label for="" class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control" name="ttl" id="nama" placeholder="Tambah Tanggal Lahir" required>
                            <br>
                            <div class="form-group">
                                <label for="">Jenis Kelamin</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin1" value="Laki Laki" checked>
                                    <label class="form-check-label" for="flexRadioDefault1">Laki-laki</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin2" value="Perempuan">
                                    <label class="form-check-label" for="flexRadioDefault2">Perempuan</label>
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                            <label for="" class="form-label">Umur</label>
                            <input type="number" class="form-control" name="umur" id="umur" placeholder="Tambah Umur" required>
                            </div>
                            <br>
                            <div class="form-group">
                            <label for="" class="form-label">Alamat</label>
                            <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Tambah Alamat" required>
                            </div>
                            <br>
                            <div class="input-group mb-3">
                            <input type="file" class="form-control" name="foto" id="foto">
                            <label class="input-group-text" for="inputGroupFile02">Upload</label>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary float-end" name="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>