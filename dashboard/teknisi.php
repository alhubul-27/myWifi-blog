<?php
session_start();

if (!isset($_SESSION['data'])) {
    header('Location: ../home/index.php');
    exit();
}

include "../koneksi/koneksi.php";
$sql = "SELECT * FROM teknisi";
$query = $koneksi->query($sql);
$datas = [];

if ($query->num_rows > 0) {
    while ($row = $query->fetch_assoc()) {
        $datas[] = $row;
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Data Admin</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="admin.php">
                    <i class="bi bi-person-fill"></i>
                    <span>Admin</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="teknisi.php">
                    <i class="bi bi-person-fill"></i>
                    <span>Teknisi</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="area-layanan.php">
                    <i class="bi bi-geo-alt-fill"></i>
                    <span>Area Layanan</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="layanan.php">
                    <i class="bi bi-router-fill"></i>
                    <span>Layanan</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="riwayat-transaksi.php">
                    <i class="bi bi-clock-history"></i>
                    <span>Riwayat Transaksi</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.html">
                    <i class="bi bi-chat-left-dots"></i>
                    <span>Status Layanan</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="ulasan.php">
                    <i class="bi bi-chat-dots"></i>
                    <span>Ulasan</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="../aksi/aksi_login.php?op=out">
                    <i class="bi bi-box-arrow-left"></i>
                    <span>Logout</span></a>
            </li>
            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $_SESSION['data']['nm_lengkap'] ?></span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Teknisi</h1>
                    </div>
                    <main>
                        <div class="container-fluid px-4 mt-4">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-table me-1"></i>
                                    Data Teknisi
                                </div>
                                <div class="card-body">
                                    <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addTeknisi">
                                        <i class="bi bi-plus-circle"></i> Tambah Teknisi
                                    </button>
                                    <table class="table table-dark table-striped-columns">
                                        <thead class="table-dark fs-6">
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">Nama Lengkap</th>
                                                <th scope="col">Nomor Handphone</th>
                                                <th scope="col">Keahlian</th>
                                                <th scope="col">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody class="fs-6">
                                            <?php
                                            $i = 1;
                                            foreach ($datas as $data) : ?>
                                                <tr>
                                                    <td scope="col"><?= $i++ ?></td>
                                                    <td scope="col"><?= $data['nama_teknisi'] ?></td>
                                                    <td scope="col"><?= $data['no_teknisi'] ?></td>
                                                    <td scope="col"><?= $data['keahlian'] ?></td>
                                                    <td>
                                                        <a href="" class="text-decoration-none btn btn-primary btn-sm m-1" data-toggle="modal" data-target="#EditModal<?= $data['id_teknisi']; ?>">
                                                            <i class="bi bi-pencil-square"></i>
                                                        </a>
                                                        <a href="" class="text-decoration-none btn btn-danger btn-sm m-1" data-toggle="modal" data-target="#deleteModal<?= $data['id_teknisi']; ?>">
                                                            <i class="bi bi-trash3"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <div class="modal fade" id="EditModal<?= $data['id_teknisi']; ?>" tabindex="-1" aria-labelledby="EditModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Edit Admin</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="function.php" method="post">
                                                                <div class="col-12">
                                                                        <label for="nama_teknisi" class="form-label">Nama Lengkap</label>
                                                                        <input type="text" class="form-control" name="nama_teknisi" id="nama_teknisi" value="<?= $data['nama_teknisi'] ?>" required>
                                                                    </div>
                                                                    <div class="col-12 mt-3">
                                                                        <label for="no_teknisi" class="form-label">Nomor Handphone</label>
                                                                        <input type="number" class="form-control" name="no_teknisi" id="no_teknisi" value="<?= $data['no_teknisi'] ?>" required>
                                                                    </div>
                                                                    <div class="col-12 mt-3">
                                                                        <label for="keahlian" class="form-label">Keahlian</label>
                                                                        <input type="text" class="form-control" name="keahlian" id="keahlian" value="<?= $data['keahlian'] ?>"  required>
                                                                        <input type="hidden" name="id_teknisi" value="<?= $data['id_teknisi']; ?>">
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                                        <button type="submit" class="btn btn-primary" name="editTeknisi">Simpan Perubahan</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="modal fade" id="deleteModal<?= $data['id_teknisi']; ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Hapus Teknisi</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Apakah Anda yakin ingin menghapus?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <form action="function.php?id=<?= $data['id_teknisi']; ?>" method="post">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                                    <button type="submit" class="btn btn-danger" name="deleteTeknisi">Hapus</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </main>
                </div>
            </div>
            <!-- End of Main Content -->

            <div class="modal fade" id="addTeknisi" tabindex="-1" aria-labelledby="addTeknisiLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addTeknisi">Tambah Teknisi</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="function.php" method="post">
                                <div class="col-12">
                                    <label for="nama_teknisi" class="form-label">Nama Lengkap</label>
                                    <input type="text" class="form-control" name="nama_teknisi" id="nama_teknisi" required>
                                </div>
                                <div class="col-12 mt-3">
                                    <label for="no_teknisi" class="form-label">Nomor Handphone</label>
                                    <input type="number" class="form-control" name="no_teknisi" id="no_teknisi" required>
                                </div>
                                <div class="col-12 mt-3">
                                    <label for="keahlian" class="form-label">Keahlian</label>
                                    <input type="text" class="form-control" name="keahlian" id="keahlian" required>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-primary" name="addTeknisi">Tambah</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Footer -->
                <!-- <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; Your Website 2021</span>
                        </div>
                    </div>
                </footer> -->
                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="../aksi/aksi_login.php?op=out">Logout</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.min.js"></script>
</body>

</html> 