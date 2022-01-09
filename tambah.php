<?php
include 'koneksi.php';

if (!$_SESSION['login']) {
    header('location: login.php');
    exit;
}

if (isset($_POST['tambah'])) {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $jurusan = $_POST['jurusan'];

    $sql = "INSERT INTO tb_mahasiswa VALUES ('', '$nim', '$nama', '$jurusan')";
    mysqli_query($koneksi, $sql);

    echo "
        <script>
            alert('Tambah data sukses');
            window.location='index.php';
        </script>
    ";
}


?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Halaman Tambah</title>
</head>

<body style="background-color: #eaeaea;">

    <div class="container p-5 w-50">
        <h1 class="text-center fw-bold mb-5">TAMBAH DATA</h1>

        <div class="card shadow">
            <div class="card-header text-center fw-bold">
                Form tambah data
            </div>

            <form action="" method="post">
                <div class="card-body p-4">

                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Input Stambuk" maxlength="9" name="nim" required>
                    </div>

                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Input Nama" name="nama" required>
                    </div>

                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Input Jurusan" name="jurusan" required>
                    </div>

                    <div class="mb-4 mt-4">
                        <button type="submit" class="btn btn-primary" name="tambah">Tambah</button>
                        <button type="reset" class="btn btn-danger">Reset</button>
                    </div>

                    <p class="text-center">Kembali ke halaman <a class="fw-bold" href="index.php">utama</a></p>
                </div>
            </form>
        </div>

    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>