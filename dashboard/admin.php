<?php
session_start();

if (!isset($_SESSION['data'])) {
    header('Location: ../home/index.php');
    exit();
}

include "../koneksi/koneksi.php";
$sql = "SELECT * FROM register WHERE level = 'admin'";
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
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Admin</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.html">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Area Layanan</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.html">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Layanan</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.html">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Riwayat Transaksi</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Pesanan</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <a class="nav-link" href="index.html">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Pesanan Layanan</span></a>
                    <a class="nav-link" href="index.html">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Pesanan Teknisi</span></a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.html">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>FAQ</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.html">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Teknisi</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.html">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Layanan</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="../aksi/aksi_login.php?op=out">
                    <i class="fas fa-fw fa-table"></i>
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
                        <h1 class="h3 mb-0 text-gray-800">Admin</h1>
                    </div>
                    <main>
                        <div class="container-fluid px-4 mt-4">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-table me-1"></i>
                                    Data Admin
                                </div>
                                <div class="card-body">
                                    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addPenulis">
                                        <i class="bi bi-plus-circle"></i> Tambah Admin
                                    </button>
                                    <table class="table table-dark table-striped-columns">
                                        <thead class="table-dark fs-6">
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">Nama Lengkap</th>
                                                <th scope="col">Username</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Nomor Handphone</th>
                                                <th scope="col">Alamat</th>
                                                <th scope="col">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody class="fs-6">
                                            <?php
                                            $i = 1;
                                            foreach ($datas as $data) : ?>
                                                <tr>
                                                    <td scope="col"><?= $i++ ?></td>
                                                    <td scope="col"><?= $data['nm_lengkap'] ?></td>
                                                    <td scope="col"><?= $data['username'] ?></td>
                                                    <td scope="col"><?= $data['email'] ?></td>
                                                    <td scope="col"><?= $data['no_hp'] ?></td>
                                                    <td scope="col"><?= $data['alamat'] ?></td>
                                                    <td>
                                                        <a href="" class="text-decoration-none btn btn-primary btn-sm m-1" data-bs-toggle="modal" data-bs-target="#EditModal<?= $data['id_user']; ?>">
                                                            <i class="bi bi-pencil-square"></i>
                                                        </a>
                                                        <a href="" class="text-decoration-none btn btn-danger btn-sm m-1" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $data['id_user']; ?>">
                                                            <i class="bi bi-trash3"></i>
                                                        </a>
                                                    </td>
                                                </tr>

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

            <div class="modal fade" id="EditModal<?= $data['id_user']; ?>" tabindex="-1" aria-labelledby="EditModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="EditModalLabel">Edit Artikel</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="aksi_admin.php" method="post" enctype="multipart/form-data">
                                <!-- <input type="text" name="id_artikel" class="visually-hidden" value="<?= $data['id_user']; ?>">
                                <input type="text" name="penulis" class="visually-hidden" value="<?= $artikel['id_penulis'] ?>">
                                <div class="mb-3">
                                    <label for="judul-edit" class="form-label">Judul</label>
                                    <input type="text" name="judul" id="judul-edit" class="form-control" value="<?= $artikel['judul'] ?>" required />
                                </div>
                                <input type="text" name="slug" id="slug-edit" class="visually-hidden" value="<?= $artikel['slug'] ?>" required />
                                <div class="mb-3">
                                    <label for="kategori" class="form-label">Kategori</label>
                                    <select id="kategori" class="form-select" name="kategori" required>
                                        <option value="<?= $artikel['id_kategori'] ?>" selected><?= $artikel['nama_kategori'] ?></option>
                                        <?php foreach ($data['kategoris'] as $kategori) : ?>
                                            <?php if ($kategori['id_kategori'] == $artikel['id_kategori']) continue; ?>
                                            <option value="<?= $kategori['id_kategori'] ?>"><?= $kategori['nama_kategori'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="editor<?= $i ?>" class="form-label">Isi</label>
                                    <textarea name="isi" id="editor<?= $i ?>"><?= $artikel['isi'] ?>"</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="image" class="form-label">Gambar :</label>
                                    <input type="file" name="image" id="image" class="form-control" />
                                    <input type="text" name="image-lawas" class="visually-hidden" value="<?= $artikel['gambar'] ?>">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" name="edit">Edit</button>
                                </div> -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="deleteModal<?= $data['id_user'];; ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Penghapusan</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Apakah Anda yakin ingin menghapus?
                        </div>
                        <div class="modal-footer">
                            <form action="aksi_admin.php">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-danger">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
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