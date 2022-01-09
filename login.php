<?php
include 'koneksi.php';

if (isset($_SESSION['login'])) {
    header('location: index.php');
    exit;
}

if (isset($_POST['login'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    $queryCek = mysqli_query($koneksi, "SELECT * FROM users WHERE username = '$user'");
    if (mysqli_num_rows($queryCek) === 1) {
        $data = mysqli_fetch_assoc($queryCek);

        if (password_verify($pass, $data['password'])) {
            $_SESSION['login'] = true;

            header('location: index.php');
        } else {
            $valid = true;
        }
    } else {
        $not = true;
    }
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

    <title>Login Page</title>
</head>

<body style="background-color: #eaeaea;">

    <div class="container p-5 w-50">
        <h1 class="text-center fw-bold mb-5">LOGIN</h1>

        <div class="card shadow">
            <div class="card-header text-center fw-bold">
                Silahkan lengkapi form dibawah ini
            </div>

            <form action="" method="post">
                <div class="card-body p-4">

                    <?php if (isset($valid)) : ?>
                        <div class="alert alert-warning alert-dismissible fade show mb-4" role="alert">
                            <strong>Password tidak valid</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php elseif (isset($not)) : ?>
                        <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
                            <strong>Username tidak ditemukan</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif ?>

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                            </svg>
                        </span>
                        <input type="text" class="form-control" required placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" name="username">
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-unlock-fill" viewBox="0 0 16 16">
                                <path d="M11 1a2 2 0 0 0-2 2v4a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V9a2 2 0 0 1 2-2h5V3a3 3 0 0 1 6 0v4a.5.5 0 0 1-1 0V3a2 2 0 0 0-2-2z" />
                            </svg>
                        </span>
                        <input type="password" class="form-control" required placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" name="password">
                    </div>

                    <div class="d-grid mb-4">
                        <button type="submit" class="btn btn-primary btn-lg" name="login">Login</button>
                    </div>

                    <p class="text-center">Belum punya akun? SIlahkan <a class="fw-bold" href="register.php">register</a></p>
                </div>
            </form>
        </div>

    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>