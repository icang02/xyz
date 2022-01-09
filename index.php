<?php
include 'koneksi.php';

if (!$_SESSION['login']) {
    header('location: login.php');
    exit;
}

$query = mysqli_query($koneksi, "SELECT * FROM tb_mahasiswa ORDER BY jurusan");

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Welcome</title>
</head>

<body style="background-color: #eaeaea;">

    <div class="container p-5">
        <h1 class="text-center mb-4 fw-bold">Halaman Index</h1>
        <a class="btn btn-primary mb-3 shadow" href="tambah.php">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill me-1" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z" />
            </svg>
            Tambah
        </a>

        <table class="table table-hover table-bordered shadow">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Stambuk</th>
                    <th scope="col">Nama Mahasiswa</th>
                    <th scope="col">Jurusan</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>

                <?php
                $no = 1;
                while ($data = mysqli_fetch_assoc($query)) :
                ?>
                    <tr>
                        <th scope="row"><?= $no++ . '.' ?></th>
                        <td><?= $data['nim'] ?></td>
                        <td><?= $data['nama'] ?></td>
                        <td><?= $data['jurusan'] ?></td>
                        <td>
                            <a class="btn btn-sm btn-warning" href="update.php?id=<?= $data['id'] ?>">Update</a>
                            <a class="btn btn-sm btn-danger" href="delete.php?id=<?= $data['id'] ?>" onclick="return confirm('Hapus data?') ">Hapus</a>
                        </td>
                    </tr>
                <?php endwhile ?>

            </tbody>
        </table>

        <div class="text-end">
            <a class="btn btn-secondary mt-3 shadow" href="logout.php" onclick="return confirm('Logout?') ">Logout</a>
        </div>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>