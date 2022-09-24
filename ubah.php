<?php 
    require "function.php";

    $id = $_GET['id'];

    $datasiswa = query("SELECT * FROM tb_siswa WHERE id=$id")[0];

    if (isset($_POST["submit"])) {
        if (ubah($_POST) > 0) {
            echo "
                <script>
                    alert('Data Berhasil Di Ubah');
                    document.location.href = 'index.php';
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('Data Gagal Di Ubah');
                    document.location.href = 'index.php';
                </script>
            ";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Belajar PHP</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>

<body>
    <?php
    include 'navbar.php';
    ?>

    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <h3 align="center">Tambah Data Siswa</h3>
                        <form action="" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?= $datasiswa["id"]?>">
                            <input type="hidden" name="foto_lama" value="<?= $datasiswa["foto"]?>">
                            <div class="form-group mb-3">
                                <label for="exampleInputName">Nama</label>
                                <input type="name" class="form-control" id="exampleInputName" aria-describedby="emailHelp" placeholder="Masukkan Nama" name="nama" required value="<?=$datasiswa["nama"]?>">
                            </div>
                            <div class="form-group mb-3">
                                <label for="exampleInputName">Absen</label>
                                <input type="name" class="form-control" id="exampleInputName" aria-describedby="emailHelp" placeholder="Masukkan Absen" name="absen_siswa" required value="<?=$datasiswa["absen_siswa"]?>">
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="exampleInputName" class="form-label">Tanggal Lahir</label>
                                <input type="date" class="form-control" id="exampleInputName" aria-describedby="emailHelp" placeholder="Masukkan Tanggal Lahir" name="ttl" required value="<?=$datasiswa["ttl"]?>">
                            <br>
                            <div class="form-group">
                                <label for="exampleInputName">Jenis Kelamin</label><br>
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
                            <div class="form-group mb-3">
                                <label for="exampleInputPassword1">Umur</label>
                                <input type="number" class="form-control" id="exampleInputPassword1" placeholder="Masukkan Umur" name="umur" required value="<?=$datasiswa["umur"]?>">
                            </div>
                            <div class="form-group mb-3">
                                <label for="exampleInputName">Alamat</label>
                                <input type="name" class="form-control" id="exampleInputName" aria-describedby="emailHelp" placeholder="Masukkan Alamat" name="alamat" value="<?=$datasiswa["alamat"]?>">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Foto</label>
                                <img src="asset/<?= $datasiswa["foto"]?>" alt="">
                                <input type="file" class="form-control" id="exampleInputName" aria-describedby="emailHelp" placeholder="Masukkan Foto" name="foto" value="<?=$datasiswa["foto"]?>">
                            </div>

                            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>