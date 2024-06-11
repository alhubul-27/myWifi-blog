<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login Akun</title>
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f0f0f0; /* Ganti warna background */
        }
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0px 0px 20px 0px rgba(0,0,0,0.1);
        }
        .form-label {
            font-weight: bold;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
            transition: all 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .link-secondary {
            color: #6c757d;
        }
        .link-secondary:hover {
            color: #343a40;
        }
        /* Atur posisi tengah */
        .centered {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
    </style>
</head>
<body>
    <div class="centered">
        <section class="p-3 p-md-4 p-xl-5">
            <div class="container">
                <div class="card">
                    <div class="row g-0">
                        <div class="col-md-6">
                            <img class="img-fluid rounded-start" src="./assets/icon login.png" alt="BootstrapBrain Logo"> <!-- Ganti gambar -->
                        </div>
                        <div class="col-md-6">
                            <div class="card-body p-4">
                                <h3 class="mb-4">Log in</h3>
                                <form action="../aksi/aksi_login.php?op=in" method="post">
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Username <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="username" id="email" placeholder="Enter your username" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                                        <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password" required>
                                    </div>
                                    <div class="mb-3">
                                        <button class="btn btn-primary btn-lg btn-block" type="submit">Log in now</button>
                                    </div>
                                </form>
                                <hr class="my-4">
                                <p class="text-center">Belum punya akun? <a href="form_register.php" class="link-secondary">Daftar</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>

</html>