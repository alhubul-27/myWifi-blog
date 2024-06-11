<!DOCTYPE html>
<html lang="en">
<?php session_start(); ?>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>My Wifi</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Ulasan WiFi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f9f9f9;
        }

        h2 {
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th,
        td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #ffc800;
            color: white;
        }

        select,
        textarea {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        textarea {
            height: 150px;
            resize: vertical;
        }

        button {
            background-color: #ffc800;
            color: white;
            padding: 15px 20px;
            margin-top: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #ffc800;
        }
    </style>
</head>

<body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="#home"><img src="assets/img/navbar-logo.svg" alt="..." /></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars ms-1"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                    <li class="nav-item"><a class="nav-link" href="#home">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#features">Paket</a></li>
                    <li class="nav-item"><a class="nav-link" href="#pricing">Layanan</a></li>
                    <li class="nav-item"><a class="nav-link" href="#faq">Ulasan</a></li>
                </ul>
                <?php if (isset($_SESSION['data'])) : ?>
                    <div class="flex-shrink-0 dropdown mt-1 ms-5">
                        <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
                        </a>
                        <ul class="dropdown-menu text-small shadow">
                            <li><a class="dropdown-item" href="../aksi/aksi_login.php?op=out">Sign out</a></li>
                        </ul>
                    </div>
                <?php else : ?>
                    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a href="../form/form_login.php" class="nav-link">Login</a></li>
                        <li class="nav-item"><a href="../form/form_register.php" class="nav-link">Sign up</a></li>
                    </ul>
                <?php endif; ?>
            </div>
        </div>
    </nav>
    <!-- Home-->
    <header class="masthead" id="home">
        <div class="container">
            <div class="masthead-subheading">Selamat datang di</div>
            <div class="masthead-heading text-uppercase">MY WIFI</div>
            <a class="btn btn-primary btn-xl text-uppercase" href="#about">Klik Di Sini!!</a>
        </div>
    </header>
    <!-- About-->
    <section class="page-section" id="about">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Cara Berlangganan di My Wifi</h2>
                <h3 class="section-subheading text-muted">Tiga langkah mudah untuk menggunakan layanan kami</h3>
            </div>
            <ul class="timeline">
                <li>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h4>1. Registrasi</h4>
                        </div>
                        <div class="timeline-body">
                            <p class="text-muted">Daftar dan masukan data diri anda</p>
                        </div>
                    </div>
                </li>
                <li class="timeline-inverted">
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h4>2. Pesanan</h4>
                        </div>
                        <div class="timeline-body">
                            <p class="text-muted">Cek area lokasi pemasangan dan pilih paket</p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h4>3. Pembayaran</h4>
                        </div>
                        <div class="timeline-body">
                            <p class="text-muted">Bayar dan nikmati kecepatan layanan dari My Wifi</p>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </section>
    <!-- Features -->
    <section class="page-section bg-light" id="features">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Paket</h2>
                <h3 class="section-subheading text-muted">Wifi Dan TV Parabola</h3>
            </div>
            <div class="row">
                <div class="col-lg-4 col-sm-6 mb-4">
                    <!-- Portfolio item 1-->
                    <div class="portfolio-item">
                        <a class="portfolio-link" data-bs-toggle="modal" href="../paket/langganan.php?paket=30 Mbps">
                            <div class="portfolio-hover">
                                <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="assets/img/portfolio/wifi.jpeg" alt="..." />
                        </a>
                        <div class="portfolio-caption">
                            <div class="portfolio-caption-heading">30 Mbps</div>
                            <div class="portfolio-caption-subheading text-muted">Rp. 235.000/bulan</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 mb-4">
                    <!-- Portfolio item 2-->
                    <div class="portfolio-item">
                        <a class="portfolio-link" data-bs-toggle="modal" href="../paket/langganan.php?paket=50 Mbps">
                            <div class="portfolio-hover">
                                <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="assets/img/portfolio/wifi.jpeg" alt="..." />
                        </a>
                        <div class="portfolio-caption">
                            <div class="portfolio-caption-heading">50 Mbps</div>
                            <div class="portfolio-caption-subheading text-muted">Rp. 250.000/bulan</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 mb-4">
                    <!-- Portfolio item 3-->
                    <div class="portfolio-item">
                        <a class="portfolio-link" data-bs-toggle="modal" href="../paket/langganan.php?paket=100 Mbps">
                            <div class="portfolio-hover">
                                <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="assets/img/portfolio/wifi.jpeg" alt="..." />
                        </a>
                        <div class="portfolio-caption">
                            <div class="portfolio-caption-heading">100 Mbps</div>
                            <div class="portfolio-caption-subheading text-muted">Rp. 350.000/bulan</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 mb-4 mb-lg-0">
                    <!-- Portfolio item 4-->
                    <div class="portfolio-item">
                        <a class="portfolio-link" data-bs-toggle="modal" href="../paket/langganan.php?paket=73 Channel">
                            <div class="portfolio-hover">
                                <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="assets/img/portfolio/parabola.jpg" alt="..." />
                        </a>
                        <div class="portfolio-caption">
                            <div class="portfolio-caption-heading">73 Channel + STB Android</div>
                            <div class="portfolio-caption-subheading text-muted">Rp. 310.000/bulan</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 mb-4 mb-sm-0">
                    <!-- Portfolio item 5-->
                    <div class="portfolio-item">
                        <a class="portfolio-link" data-bs-toggle="modal" href="../paket/langganan.php?paket=75 Channel">
                            <div class="portfolio-hover">
                                <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="assets/img/portfolio/parabola.jpg" alt="..." />
                        </a>
                        <div class="portfolio-caption">
                            <div class="portfolio-caption-heading">75 Channel + STB Android</div>
                            <div class="portfolio-caption-subheading text-muted">Rp. 385.000/bulan</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <!-- Portfolio item 6-->
                    <div class="portfolio-item">
                        <a class="portfolio-link" data-bs-toggle="modal" href="../paket/langganan.php?paket=80 Channel">
                            <div class="portfolio-hover">
                                <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="assets/img/portfolio/parabola.jpg" alt="..." />
                        </a>
                        <div class="portfolio-caption">
                            <div class="portfolio-caption-heading">80 Channel + STB Android</div>
                            <div class="portfolio-caption-subheading text-muted">Rp. 410.000/bulan</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Kendala-->
    <section class="page-section" id="pricing">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Layanan</h2>
                <h3 class="section-subheading text-muted">Platfrom untuk pengguna melakukan pengaduan komplain</h3>
                <div class="row text-center">
                    <form method="POST" enctype="multipart/form-data" action="aksi_home.php">
                        <div class="col-md-6 offset-md-3">
                            <br>
                            <div class="mb-3">
                                <label for="kendala" class="form-label">Kendala</label>
                                <input type="text" name="kendala" class="form-control" id="kendala" placeholder="Ex : Wifi Trouble" required>
                            </div>
                            <div class="mb-3">
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                <textarea name="deskripsi" id="deskripsi" class="form-control" placeholder="Ex : Wifi Bla bla" required></textarea>
                            </div>
                            <hr>
                            <div class="mb-3 mt-3">
                                <label class="form-label">Unggah Foto Kendala:</label>
                                <input type="file" name="image" class="form-control" required>
                            </div>
                            <hr>
                            <button type="submit" class="btn btn-primary" name="upload">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
    </section>
    <!-- Ulasan-->
    <section class="page-section bg-light" id="faq">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Ulasan</h2>
                <h3 class="section-subheading text-muted">Kita sangat mengapresiasi tanggapan dari kalian</h3>
            </div>
            <div class="row">
                <!DOCTYPE html>
                <html lang="id">

                <body>

                    <h2>Form Ulasan My WiFi</h2>
                    <form action="aksi_home.php" method="post">
                        <table>
                            <tr>
                                <th>Rating</th>
                                <th>Ulasan</th>
                            </tr>
                            <tr>
                                <td>
                                    <select name="rating" required>
                                        <option value="">Pilih Rating</option>
                                        <option value="Sangat Buruk">1 - Sangat Buruk</option>
                                        <option value="Buruk">2 - Buruk</option>
                                        <option value="Cukup">3 - Cukup</option>
                                        <option value="Baik">4 - Baik</option>
                                        <option value="Sangat Baik">5 - Sangat Baik</option>
                                    </select>
                                </td>
                                <td>
                                    <textarea name="review" placeholder="Tuliskan ulasan Anda di sini..." required></textarea>
                                </td>
                            </tr>
                        </table>
                        <button type="submit" name="ulasan">Kirim Ulasan</button>
                    </form>

                </body>

                </html>

            </div>
            <div class="row">
                <div class="col-lg-8 mx-auto text-center">
                    <p class="large text-muted">Terima Kasih Untuk Tanggapan, Saran maupun Kritikan nya</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer-->
    <footer class="footer py-4">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 text-lg-start">Copyright &copy; My Wifi</div>
                <div class="col-lg-4 my-3 my-lg-0">
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <a class="link-dark text-decoration-none me-3" href="#!">Privacy Policy</a>
                    <a class="link-dark text-decoration-none" href="#!">Terms of Use</a>
                </div>
            </div>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>