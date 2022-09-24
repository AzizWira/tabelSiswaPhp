<?php
require 'function.php';

$data = query('SELECT * FROM tb_siswa');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>latihan php dasar</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
    <?php include 'navbar.php'; ?>
    <div class="container-lg" style="margin-top: 10px;">
        <div class="row">
            <div class="col-md-12">
                <h1 style="text-align: center;">11 RPL 1 - Ahmad Aziz Wira widodo</h1>
                <div class="card">
                    
                    <div class="card-body">
                    <a type="button" class="btn btn-primary float-end" href="tambah.php">Tambah Data Siswa</a>
                    <br><br>
                        <table class="table table-dark  table-striped align-middle">
        <thead >
            <tr style="text-align: center;">
                <th>ID</th>
                <th>Nama</th>
                <th>Absen Siswa</th>
                <th>Umur</th>
                <th>Foto</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody style="text-align: center;">
            <?php
            $no = 1;
            foreach ($data as $siswa) { ?>
                <tr>    
                <td><?= $no++ ?></td>
                        <td><?= $siswa['nama'] ?></td>
                        <td><?= $siswa['absen_siswa'] ?></td>
                        <td><?= $siswa['umur'] ?></td>
                        <td><img src=asset/<?= $siswa['foto'] ?> alt="<?= $siswa['nama'] ?>" width="100" height="100"></td>
                    <td>
                        <a type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $siswa['id'] ?>" >Info</a>
                        <a type="button" class="btn btn-warning" href="ubah.php?id=<?= $siswa['id'] ?>"onclick="return confirm('Yakin Ingin Mengubah Data?');">Edit</a>
                        <a type="button" href="delete.php?id=<?= $siswa['id'] ?>" onclick="return confirm('Yakin Ingin Menghapus Data?');" class="btn btn-danger float-md-none">Delete</a>
                        </td>
                </tr>
                <!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="exampleModal<?= $siswa['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detal Siswa</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <br>
                            <div class="form-group">
                            <label for="" class="form-label">Nama</label>
                            <input type="text" class="form-control" name="nama" id="nama" value="<?= $siswa['nama'] ?>" readonly>
                            </div>
                            <br>
                            <div class="form-group">
                            <label for="" class="form-label">Absen Siswa</label>
                            <input type="number" class="form-control" name="umur" id="umur" value="<?= $siswa['umur'] ?>" readonly>
                            </div>
                            <br>
                            <div class="form-group">
                            <label for="" class="form-label">Tanggal Masuk</label>
                            <input type="date" class="form-control" name="ttl" id="ttl" value="<?= $siswa['ttl'] ?>" readonly>
                            <br>
                            <div class="form-group">
                            <label for="" class="form-label">Jenis Kelamin</label>
                            <input type="text" class="form-control" name="jenis_kelamin" id="jenis_kelamin" value="<?= $siswa['jenis_kelamin'] ?>" readonly>
                            <br>
                            <div class="form-group">
                            <label for="" class="form-label">Umur</label>
                            <input type="number" class="form-control" name="umur" id="umur" value="<?= $siswa['umur'] ?>" readonly>
                            </div>
                            <br>
                            <div class="form-group">
                            <label for="" class="form-label">Alamat</label>
                            <input type="text" class="form-control" name="alamat" id="alamat" value="<?= $siswa['alamat'] ?>" readonly>
                            </div>
                            <div class="form-group">
                            <label for="" class="form-label">Gambar Siswa</label>
                            <img src=asset/<?= $siswa['foto'] ?> alt="<?= $siswa['nama'] ?>" width="100" height="100">
                           
                            </div>
                            <br>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary" >Save changes</button> -->
        <a type="button" class="btn btn-primary" href="ubah.php?id=<?= $siswa[
            'id'
        ] ?>"onclick="return confirm('Yakin Ingin Mengubah Data?');">Edit</a>
        <a type="button" href="delete.php?id=<?= $siswa[
            'id'
        ] ?>" onclick="return confirm('Yakin Ingin Menghapus Data?');" class="btn btn-danger float-md-none">Delete</a>
      </div>
    </div>
  </div>
</div>
            <?php }
            ?>
        </tbody>
    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <center>
        

    
    </center>
    

    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>