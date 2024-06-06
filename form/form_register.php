<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Daftar Akun</title>
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.4/components/logins/login-4/assets/css/login-4.css">
</head>

<body>
    <!-- Login 4 - Bootstrap Brain Component -->
    <section class="p-3 p-md-4 p-xl-5">
        <div class="container">
            <div class="card border-light-subtle shadow-sm">
                <div class="row g-0">
                    <div class="col-12 col-md-6">
                        <img class="img-fluid rounded-start w-100 h-100 object-fit-cover" loading="lazy" src="./assets/img/logo-img-1.webp" alt="BootstrapBrain Logo">
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="card-body p-3 p-md-4 p-xl-5">
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-5">
                                        <h3>Register</h3>
                                    </div>
                                </div>
                            </div>
                            <form action="../aksi/aksi_register.php" method="post">
                                <div class="row gy-3 gy-md-4 overflow-hidden">
                                    <div class="col-12">
                                        <label for="text" class="form-label">Username <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="username" id="username" placeholder="Username" required>
                                    </div>
                                    <div class="col-12">
                                        <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                                        <input type="password" class="form-control" name="password" id="password" value="" required>
                                    </div>
                                    <div class="col-12">
                                        <label for="text" class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="nm_lengkap" id="email" required>
                                    </div>
                                    <div class="col-12">
                                        <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                        <input type="email" class="form-control" name="email" id="password" value="" required>
                                    </div>
                                    <div class="col-12">
                                        <label for="nohp" class="form-label">Nomor Handphone <span class="text-danger">*</span></label>
                                        <input type="number" class="form-control" name="nohp" id="password" value="" required>
                                    </div>
                                    <div class="col-12">
                                        <label for="alamat" class="form-label">Alamat <span class="text-danger">*</span></label>
                                        <br>
                                        <textarea id="alamat" name="alamat" rows="4" class="form-control"></textarea>    
                                    </div>
                                    <div class="col-12">
                                        <div class="d-grid">
                                            <button class="btn bsb-btn-xl btn-primary" type="submit">Regesiter now</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="row">
                                <div class="col-12">
                                    <hr class="mt-5 mb-4 border-secondary-subtle">
                                    <div class="d-flex gap-2 gap-md-4 flex-column flex-md-row justify-content-md-end">
                                        Sudah Punya Akun?<a href="form_login.php" class="link-secondary text-decoration-none">Log In</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>